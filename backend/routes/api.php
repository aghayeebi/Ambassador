<?php

use App\Http\Controllers\AmbassadorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
function common(string $scope)
{
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware(['auth:sanctum', $scope])->group(function () {
        Route::get('user', [AuthController::class, 'user']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::put('users/info', [AuthController::class, 'UpdateInfo']);
        Route::put('users/password', [AuthController::class, 'UpdatePassword']);


        Route::get('Ambassadors', [AmbassadorController::class, 'index']);
        Route::get('users/{id}/links', [LinkController::class, 'index']);
        Route::get('orders', [OrderController::class, 'index']);

        Route::apiResource('products', ProductController::class);
    });
}

//Admin
Route::prefix('admin')->group(function () {
    common('scope.admin');
});

//Ambassadors

Route::prefix('ambassador')->group(function () {
    common('scope.ambassador');

    Route::get('product/frontend', [ProductController::class,'frontend']);
    Route::get('product/backend', [ProductController::class,'backend']);



    Route::middleware(['auth:sanctum', 'scope.ambassador'])->group(function () {
        Route::post('links', [LinkController::class, 'store']);
        Route::get('stats', [StatsController::class, 'index']);
        Route::get('rankings', [StatsController::class, 'rankings']);
    });
});


Route::prefix('checkout')->group(function () {
    Route::get('links/{code}', [LinkController::class, 'show']);
    Route::post('orders', [OrderController::class, 'store']);
    Route::post('orders/confirm', [OrderController::class, 'confirm']);
});

//checkout
