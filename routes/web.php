<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/',[ProductController::class,'index'])    ->name('ind');
Route::get('/products',[ProductController::class,'index'])    ->name('index');

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/auth',[LoginController::class,'postLogin'])->name('auth');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[LoginController::class,'register'])->name('register');
Route::post('/adduser',[LoginController::class,'postRegister'])->name('adduser');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/about', [Controller::class, 'about'])->name('about');
    Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
    Route::get('/cart/add/{product}/', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/delete/{id}/', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    Route::get('/checkout', [OrderController::class, 'create'])->name('checkout');
    Route::post('/buy', [OrderController::class, 'buy'])->name('buy');
    Route::post('/send', [MailController::class, 'send'])->name('send');
});


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/products/save',[ProductController::class,'save'])->name('products.save');
    Route::delete('/products/{product}/delete',[ProductController::class,'delete'])->name('product.delete');
    Route::get('/faker', [Controller::class, 'faker'])->name('faker');

});
