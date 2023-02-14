<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;


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

Route::get('/', function(){
 
   
  return view('welcome');
   
});


