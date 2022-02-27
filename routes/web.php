<?php

use App\Http\Controllers\Admin\WishListController;
use App\Http\Controllers\Home\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/', [HomeController::class, 'home']);
// For Auth User
Route::prefix('/')->middleware('auth', 'is_block')->group(function () {  
    Route::get('profile', [HomeController::class, 'profile'])->name('home.profile');
    Route::post('change-password', [HomeController::class, 'passwordChange'])->name('home.change_password');
    // Route::post('add-cart/{product}', [HomeController::class, 'addCart'])->name('home.cart');
    // Route::get('wish-list', [HomeController::class, 'wishList'])->name('home.wish');
    Route::post('wish-list/{product}', [HomeController::class, 'wishListStore'])->name('home.wish_list');
    Route::get('home-wish-list', [HomeController::class, 'wishList'])->name('wish.wish_list');
    Route::get('home-add-cart', [HomeController::class, 'addCart'])->name('home-add-cart');
    Route::get('product-shipping', [HomeController::class, 'shipping'])->name('home.shipping');

});
// With Out Logged In
Route::get('product', [HomeController::class, 'products'])->name('home.product');
Route::get('category', [HomeController::class, 'categories'])->name('home.category');
Route::get('contact', [HomeController::class, 'contact'])->name('home.contact');
Route::post('contact-store', [HomeController::class, 'contactFormStore'])->name('home.contact_store');


    