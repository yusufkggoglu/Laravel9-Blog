<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminUserController;
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



//**********************ADMİN PANEL ROUTES****************************
Route::prefix('admin')->name('admin_')->group(function () {
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
