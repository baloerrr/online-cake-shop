<?php

use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\catagory;
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

Route::get('/', function () {
    return view('login');
});

Route::get('login',[AuthenticatedController::class,'create'])->name('login');
Route::post('login',[AuthenticatedController::class,'store'])->name('login.post');
Route::get('dashboard',[AuthenticatedController::class,'dashboard'])->name('dashboard');

Route::get('register',[RegisterController::class,'create'])->name('register');
Route::post('register',[RegisterController::class,'store'])->name('register.post');

Route::get('logout',[AuthenticatedController::class,'destroy'])->name('logout');

Route::resource('user',UserController::class);
Route::resource('product',ProductController::class);
Route::resource('customer',CustomerController::class);
Route::resource('catagory',CatagoryController::class);
Route::resource('checkout',CheckoutController::class);
Route::resource('keranjang', KeranjangController::class);

Route::get('createUser', [UserController::class, 'createUser'])->name('createUser');
Route::post('storeUser', [UserController::class, 'storeUser'])->name('storeUser');


Route::get('home', [AuthenticatedController::class, 'home'])->name('home');
Route::get('shop', [CustomerController::class, 'shop'])->name('shop');
Route::get('shop/{id}', [CustomerController::class, 'shop']);
Route::get('profile', [CustomerController::class, 'profile'])->name('profile');
Route::post('keranjang/{productId}', [KeranjangController::class,'store'])->name('keranjang');



