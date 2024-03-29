<?php
use App\Http\Controllers\Api\Trader\AuthController;
use App\Http\Controllers\Api\Trader\ProductController;
use App\Http\Controllers\Api\Trader\StoreController;
use Illuminate\Support\Facades\Route;
####################### trader routs##########################
Route::group([
    'middleware' => [ 'api','CheckPassword'],
  
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/trader-profile', [AuthController::class, 'traderProfile']);
});
##########product###########
Route::group([
'middleware' => ['AssignGuard:api-trader', 'api','CheckPassword'],
 'prefix'=>'product'

], function ($router) {
    Route::post('/store', [ProductController::class, 'store']);
    Route::post('/', [ProductController::class, 'index']);
    Route::post('/{id}', [ProductController::class, 'show']);
    Route::post('/update/{id}', [ProductController::class, 'update']);
    Route::post('destroy/{id}', [ProductController::class, 'destroy']);
    
});
###################category########################
Route::group(['middleware' => ['AssignGuard:api-trader', 'api','CheckPassword'],
'prefix'=>'category',

],function(){
    Route::post('/store', [CategoryController::class, 'store']);
    Route::post('/', [CategoryController::class, 'index']);
    Route::post('/{id}', [CategoryController::class, 'show']);
    Route::post('/update/{id}', [CategoryController::class, 'update']);
    Route::post('destroy/{id}', [CategoryController::class, 'destroy']);
    Route::post('search', [CategoryController::class, 'search']);

});

################### store ########################
Route::group(['middleware' => ['AssignGuard:api-trader', 'api','CheckPassword'],
'prefix'=>'store',

],function(){
    Route::post('/store', [StoreController::class, 'store']);
    Route::post('/', [StoreController::class, 'index']);
    Route::post('/{id}', [StoreController::class, 'show']);
    Route::post('/update/{id}', [StoreController::class, 'update']);
    Route::post('destroy/{id}', [StoreController::class, 'destroy']);
  

});