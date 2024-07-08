<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [AuthenticatedController::class, 'home'])->name('home');

Route::get('login', [AuthenticatedController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedController::class, 'store'])->name('login.post');
Route::get('dashboard', [AuthenticatedController::class, 'dashboard'])->name('dashboard');

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.post');

Route::get('logout', [AuthenticatedController::class, 'destroy'])->name('logout');

Route::get('createUser', [UserController::class, 'createUser'])->name('createUser');
Route::post('storeUser', [UserController::class, 'storeUser'])->name('storeUser');
Route::middleware('hasRoleMiddleware')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('product', ProductController::class);
    Route::post('product/{id}', [ProductController::class,'update'])->name('product.update');
    Route::resource('customer', CustomerController::class);
    Route::resource('catagory', CatagoryController::class);
    Route::get('checkout', [CheckoutController::class,'index'])->name('checkout.index');
});

Route::get('shop', [CustomerController::class, 'shop'])->name('shop');
Route::get('shop/{id}', [CustomerController::class, 'shop']);
Route::post('checkout', [CheckoutController::class,'store'])->name('checkout.store');
Route::get('checkout/{checkout}/edit', [CheckoutController::class, 'edit'])->name('checkout.edit');
Route::patch('checkout/{checkout}', [CheckoutController::class, 'update'])->name('checkout.update');
Route::delete('checkout/{checkout}/delete', [CheckoutController::class, 'destroy'])->name('checkout.delete');
Route::get('profile', [CustomerController::class, 'profile'])->name('profile');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::resource('keranjang', KeranjangController::class);
Route::get('keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('keranjang/{productId}', [KeranjangController::class, 'store'])->name('keranjang');
Route::get('keranjang-handle-minus/{id}', [KeranjangController::class, 'handleKeranjangMinus'])->name('keranjang.handlerminus');
Route::get('keranjang-handle-plus/{id}', [KeranjangController::class, 'handleKeranjangPlus'])->name('keranjang.handlerplus');
Route::get('history', [CheckoutController::class, 'history'])->name('history.index');
Route::post('/checkout/{id}/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');
Route::post('/checkout/{id}/confirm', [CheckoutController::class, 'confirm'])->name('checkout.confirm');
Route::post('/checkout/{id}/reject', [CheckoutController::class, 'reject'])->name('checkout.reject');