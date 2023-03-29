<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which\admin\comment
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/categoryblogs/{id}/{slug}', [HomeController::class, 'categoryblogs'])->name('categoryblogs');
Route::get('/blog/{id}', [HomeController::class, 'blog'])->name('blog');
Route::post('/storecomment', [HomeController::class, 'storecomment'])->name('storecomment');
Route::post('/storemessage', [HomeController::class, 'storemessage'])->name('storemessage');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/search',[HomeController::class, 'search'])->name('search');
//**********************LOGİN LOGOUT PANEL ROUTES****************************
Route::view('/loginuser', 'home.login')->name('loginuser');
Route::view('/registeruser', 'home.register')->name('registeruser');
Route::view('/loginadmin', 'admin.login')->name('loginadmin');
Route::get('/logoutuser', [HomeController::class, 'logout'])->name('logoutuser');
Route::post('/loginadmincheck', [HomeController:: class, 'loginadmincheck'])->name('loginadmincheck');

Route::middleware('auth')->group(function () {

//**********************USER PANEL ROUTES****************************
    Route::get('/user/posting', [UserBlogController::class, 'index'])->name('user_blog_posting');
    Route::get('/user/blog/create', [UserBlogController::class, 'create'])->name('user_blog_create');
    Route::post('/user/blog/store', [UserBlogController::class, 'store'])->name('user_blog_store');
    Route::get('/user/blog/edit/{id}', [UserBlogController::class,'edit'])->name('user_blog_edit');
    Route::post('/user/blog/update/{id}',[UserBlogController::class, 'update'])->name('user_blog_update');
    Route::get('/user/blog/delete/{id}',[UserBlogController::class, 'destroy'])->name('user_blog_delete');
    Route::get('/user/blog/show/{id}',[UserBlogController::class, 'show'])->name('user_blog_show');

    Route::prefix('userpanel')->name('userpanel_')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/reviews', 'reviews')->name('reviews');
        Route::get('/reviewdestroy/{id}', 'reviewdestroy')->name('review_destroy');
    });

    //**********************ADMİN PANEL ROUTES****************************
    Route::middleware('admin')->prefix('admin')->name('admin_')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('home');

        //*************************GENERAL ROUTES****************************
        Route::get('/setting', [AdminHomeController::class, 'setting'])->name('setting');
        Route::post('/setting/update', [AdminHomeController::class, 'settingsUpdate'])->name('setting_update');

        Route::prefix('category')->name('category_')->controller(AdminCategoryController::class)->group(function () {
            Route::get('/', 'index')->name('home');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
            Route::get('/show/{id}', 'show')->name('show');
        });
        //****************ADMİN BLOG ROUTES*****************************
        Route::prefix('blog')->name('blog_')->controller(AdminBlogController::class)->group(function () {
            Route::get('/', 'index')->name('home');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/updatestatus/{id}', 'updatestatus')->name('updatestatus');
        });
        Route::prefix('user')->name('user_')->controller(AdminUserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/delete/{id}', 'destroy')->name('delete');
            Route::post('/addrole/{id}', 'addrole')->name('addrole');
            Route::get('/destroyrole/{uid}/{rid}', 'destroyrole')->name('destroyrole');
        });

        //****************ADMİN MESSAGE ROUTES*****************************
        Route::prefix('message')->name('message_')->controller(AdminMessageController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store/', 'store')->name('store');
            Route::get('/delete/{id}', 'destroy')->name('delete');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/show/{id}', 'show')->name('show');
        });
        //ADMIN COMMENT ROUTES
        Route::prefix('/comment')->name('comment_')->controller(AdminCommentController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });
    });
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
