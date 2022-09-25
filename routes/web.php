<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/', function () {
    return view('front/home');
});

Route::get('/shop', function() {
    return view('front/shop');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('contact', [HomeController::class, 'contact'])->name('contactus');
Route::get('store', [HomeController::class, 'shop'])->name('store');
Route::get('product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::get('add_item_to_cart/{id}', [CartController::class, 'addItem'])->name('add_item_to_cart');
Route::get('remove_item_from_cart/{id}', [CartController::class, 'destroy'])->name('remove_item_from_cart');
Route::put('update_cart/{id}', [CartController::class, 'update'])->name('update_cart');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/', function() {
        return view('admin.index');
    })->name('admin.index');

    Route::POST('admin/store', [AdminController::class, 'store']);
    Route::get('/admin', [AdminController::class, 'index']);

    Route::resource('product', ProductsController::class);
    Route::resource('category', CategoriesController::class);
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('checkout_validate', [CheckoutController::class, 'checkoutValidate'])->name('checkout_validate');

    Route::get('thankyou', function() {
        return view('profile.thankyou');
    })->name('thankyou');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('orders', [ProfileController::class, 'orders'])->name('orders');
    Route::get('address', [ProfileController::class, 'address'])->name('address');
    Route::post('update_address', [ProfileController::class, 'updateAddress'])->name('update_address');
    Route::get('password', [ProfileController::class, 'password'])->name('password');
    Route::post('update_password', [ProfileController::class, 'updatePassword'])->name('update_password');

    Route::post("addToWhishlist", [HomeController::class, 'wishlist'])->name('addToWishlist');
    Route::get('/wishlist', [HomeController::class, 'viewWishlist'])->name('wishlist');
});

require __DIR__.'/auth.php';
