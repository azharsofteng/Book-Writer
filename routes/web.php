<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Website\HomeController;
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

// Website 
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication
Route::group(['middleware' => ['guest']], function() {

    Route::get('/admin', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/admin/login', [AuthenticationController::class, 'authCheck'])->name('login.check');
});

Route::get('/table', [DashboardController::class, 'table'])->name('table');
Route::get('/form', [DashboardController::class, 'form'])->name('form');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    //Banner 
    Route::get('/banner/edit', [ContentController::class, 'banner'])->name('banner.edit');
    Route::put('/banner/update/{id}', [ContentController::class, 'bannerUpdate'])->name('banner.update');
    //Content
    Route::get('/content/edit', [ContentController::class, 'content'])->name('content.edit');
    Route::put('/content/update/{id}', [ContentController::class, 'update'])->name('content.update');
    //About
    Route::get('/about/edit', [AboutController::class, 'about'])->name('about.edit');
    Route::put('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
    //Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    //Blog
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    //Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/destroy/{id}', [GalleryController::class, 'destroy'])->name('gallery.delete');
});