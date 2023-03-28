<?php

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');



//**********************ADMİN PANEL ROUTES****************************
Route::prefix('admin')->name('admin_')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('home');

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
