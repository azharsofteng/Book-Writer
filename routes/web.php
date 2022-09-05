<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\CustomerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Website\AddToCartController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Customer\CustomerDashboardController;

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
Route::get('/about-me', [HomeController::class, 'about'])->name('about.me');
Route::get('/book/details/{slug}', [HomeController::class, 'bookDetails'])->name('book.details');
Route::get('/categories', [HomeController::class, 'category'])->name('category');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact/store', [HomeController::class, 'messageStore'])->name('contact.store');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

// cart
Route::get('/cart', [AddToCartController::class, 'Cart'])->name('shopping.cart');
Route::get('add-to-cart/{id}', [AddToCartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [AddToCartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [AddToCartController::class, 'remove'])->name('remove.from.cart');


// Customer Authentication
Route::group(['middleware' => 'guest:customer'], function() {
    Route::get('/customer/login', [CustomerController::class, 'customerLogin'])->name('customer.login');
    Route::get('/customer/registration', [CustomerController::class, 'customerRegistration'])->name('customer.registration');
    Route::post('/customer/store', [CustomerController::class, 'saveCustomer'])->name('customer.store');
    Route::post('/customer/login', [CustomerController::class, 'loginCheck'])->name('customer.login.check');
});

//Customer Dashboard 
Route::group(['middleware' => 'customer'], function() {
    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    Route::get('/customer/logout', [CustomerController::class, 'logout'])->name('customer.logout');

    // Customer Order
    Route::post('place-order', [OrderController::class, 'PlaceOrder'])->name('place.order');
    // Route::get('customer/order-list', [HomeController::class, 'orderList'])->name('customer.order.list');
    Route::get('/checkout', [HomeController::class, 'CheckOut'])->name('checkout.cart');
    
    Route::get('/customer', [CustomerController::class, 'logout'])->name('customer.logout');

    Route::get('/checkout/{id}', [AddToCartController::class, 'checkout'])->name('product.checkout');

});

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
    Route::get('/registration', [AuthenticationController::class, 'registration'])->name('admin.registration');
    Route::post('/registration', [AuthenticationController::class, 'newUser'])->name('registration.store');
    Route::put('/password', [AuthenticationController::class, 'passwordUpdate'])->name('password.change');
    Route::get('/profile', [AuthenticationController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthenticationController::class, 'profileUpdate'])->name('profile.update');

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
    //Product
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.delete');

    // order list
    Route::get('order-list', [OrderController::class, 'orderList'])->name('order.list');
    Route::delete('order-list/{id}', [OrderController::class, 'orderCancel'])->name('order.cancel');
    Route::get('invoice/{id}', [OrderController::class, 'invoice'])->name('invoice');

    Route::get('confirm-order/{id}', [OrderController::class, 'confirmOrder'])->name('confirm.order');
    Route::get('process-order/{id}', [OrderController::class, 'processOrder'])->name('process.order');
    Route::get('shipping-order/{id}', [OrderController::class, 'shippingOrder'])->name('shipping.order');
    Route::get('delivered-order/{id}', [OrderController::class, 'deliveryOrder'])->name('delivered.order');

    // customer list
    Route::get('customer-list', [DashboardController::class, 'customerList'])->name('customer.list');
    Route::delete('customer-list/{id}', [DashboardController::class, 'customerDestroy'])->name('customer.destroy');
    
});