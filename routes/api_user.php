<?php
use App\Http\Controllers\Api\User\AuthController;
use App\Http\Controllers\Api\User\RequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
####################### user routs##########################
Route::group([
    'middleware' => ['api','CheckPassword'],
    
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

##########product###########
Route::group([
    'middleware' => ['AssignGuard:api-trader', 'api','CheckPassword']
    
    ], function ($router) {
        Route::post('/product', [RequestController::class, 'indexproduct']);
        Route::post('/category', [RequestController::class, 'indexcategory']);
    });
