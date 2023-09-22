<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/register', [MainController::class, 'register'])->name('register');
Route::get('/cart', [MainController::class, 'products_in_cart'])->name('cart');
Route::get('/orders', [MainController::class, 'orders'])->name('orders');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/product/{product}/{price_id}', [MainController::class, 'product'])->name('product');

require __DIR__ . '/auth.php';