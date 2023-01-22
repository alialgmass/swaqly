<?php
use App\Http\Controllers\Api\Trader\AuthController;
use App\Http\Controllers\Api\Trader\ProductController;
use Illuminate\Support\Facades\Route;
####################### trader routs##########################
Route::group([
    'middleware' => 'api',
  
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/trader-profile', [AuthController::class, 'traderProfile']);
});
##########product###########
Route::group([
    'middleware' => 'api',
 'prefix'=>'product'
], function ($router) {
    Route::post('/store', [ProductController::class, 'store']);
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::post('destroy/{id}', [ProductController::class, 'destroy']);
    
});