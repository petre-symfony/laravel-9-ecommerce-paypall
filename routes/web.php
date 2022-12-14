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
Route::get('update_cart/{id}', [CartController::class, 'update'])->name('update_cart');
Route::get('selectSize', [HomeController::class, 'selectSize']);
Route::get('newArrival', [HomeController::class, 'newArrival']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/', function() {
        return view('admin.index');
    })->name('admin.index');

    Route::POST('admin/store', [AdminController::class, 'store']);
    Route::get('/admin', [AdminController::class, 'index']);

    Route::resource('product', ProductsController::class);
    Route::resource('category', CategoriesController::class);
    Route::get(
        'ProductEditForm/{id}',
        [ProductsController::class, 'ProductEditForm']
    )->name('ProductEditForm');

    Route::get(
        'editProducts/{id}',
        [ProductsController::class, 'editProducts']
    )->name('editProducts');

    Route::put(
        '/updateProducts/{id}',
        [ProductsController::class, 'update']
    )->name('products.update');

    Route::get('edit_image_product/{id}', [ProductsController::class, 'imageEditForm'])->name('edit_image_product_form');
    Route::post('update_image_product', [ProductsController::class, 'updateImageProduct'])->name('update_image_product');
    Route::get('/add_property/{id}', [ProductsController::class, 'addProperty'])->name('add_property');
    Route::put('/submit_property/{id}', [ProductsController::class, 'submitProperty'])->name('submit_property');
    Route::post('editProperty', [ProductsController::class, 'editProperty']);
    Route::get('addSale', [ProductsController::class, 'addSale']);
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
    Route::get('/wishlist', [HomeController::class, 'view_wishlist'])->name('wishlist');
    Route::get("/removeWishlist/{id}", [HomeController::class, 'remove_wishlist'])->name('removeWishlist');
});

require __DIR__.'/auth.php';
