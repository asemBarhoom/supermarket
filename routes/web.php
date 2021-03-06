<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ChekoutController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products',[ProductController::class,'index']);

Route::post('/checkout',[ChekoutController::class,'scan'])->name('checkout.scan');
