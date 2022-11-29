<?php
use App\Http\Controllers\Api\Trader\AuthController;
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