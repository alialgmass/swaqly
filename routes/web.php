<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Trader\AuthController;
use App\Http\Controllers\Trader\HomeController;
use App\Http\Controllers\Trader\CategoryController;
use App\Http\Controllers\Trader\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 $name = auth($guard='api-trader')->user()->name;
    $Adress = auth($guard='api-trader')->user()->Adress;
    $email = auth($guard='api-trader')->user()->email;
    $phoneNumber = auth($guard='api-trader')->user()->phoneNumber;
*/


//Auth routs
Route::group([], function () {
  Route::get('login', [AuthController::class, 'showloginform']);
  Route::post('login', [AuthController::class, 'login'])->name('login');
  Route::get('register', [AuthController::class, 'showregister']);
  Route::post('register', [AuthController::class, 'register'])->name('register');
  Route::post('logout', [AuthController::class, 'logout'])->name('logout');

});

// home routs
Route::group(['middleware' => 'auth:web'], function () {
  Route::get('/', [HomeController::class, 'index'])->name('index');
});
//   routs
Route::group(['middleware' => 'auth:web', 'prefix' => 'section'], function () {
  Route::get('/', [CategoryController::class, 'index'])->name('section.index');
  Route::get('/create', [CategoryController::class, 'create'])->name('section.create');
  Route::post('/store', [CategoryController::class, 'store'])->name('section.store');
  Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('section.edit');
  Route::post('/update/{id}', [CategoryController::class, 'update'])->name('section.update');
  Route::post('/delete/{id}', [CategoryController::class, 'destroy'])->name('section.destroy');

});
// product  routs
Route::group(['middleware' => 'auth:web', 'prefix' => 'product'], function () {
  Route::get('/', [ProductController::class, 'index'])->name('product.index');
  Route::get('/create', [ProductController::class, 'create'])->name('product.create');
  Route::post('/store', [ProductController::class, 'store'])->name('product.store');
  Route::get('/{id}', [ProductController::class, 'show'])->name('product.show');
  Route::get('prop/{id}', [ProductController::class, 'showprop'])->name('product.showprop');
  Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
  Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
  Route::post('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

});


