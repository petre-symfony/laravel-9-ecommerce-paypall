<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){
    Route::get('/', function() {
        return view('admin.index');
    })->name('admin.index');

    Route::resource('product', ProductsController::class);
});

require __DIR__.'/auth.php';
