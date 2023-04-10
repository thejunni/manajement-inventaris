<?php

use App\Http\Controllers\Api\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('product')->group(function(){
    Route::get('/',[ProductController::class, 'index']);
    Route::get('/{id}',[ProductController::class, 'show']);
    Route::post('/',[ProductController::class, 'store']);
    Route::put('/{id}',[ProductController::class, 'update']);
    Route::delete('/{id}',[ProductController::class, 'destroy']);
});

Route::prefix('transaksi')->group(function(){
    Route::get('/', [TransactionController::class, 'index']);
    Route::get('/{id}',[TransactionController::class, 'show']);
    Route::post('/', [TransactionController::class, 'store']);
    Route::put('/{id}', [TransactionController::class, 'update']);
    Route::delete('/{id}', [TransactionController::class, 'destroy']);
});

Route::prefix('order')->group(function(){
    Route::get('/', [OrderController::class, 'index']);
    Route::get('/{id}', [OrderController::class,'show']);
    Route::post('/', [OrderController::class, 'store']);
    Route::put('/{id}', [OrderController::class, 'update']);
    Route::delete('/{id}', [OrderController::class, 'destroy']);
});

Route::prefix('noti')->group(function(){
    Route::get('/',[NotificationController::class, 'index']);
    Route::get('/{id}',[NotificationController::class, 'show']);
    Route::put('/{id}',[NotificationController::class, 'update']);
    Route::post('/',[NotificationController::class, 'store']);
    Route::delete('/{id}',[NotificationController::class, 'destroy']);
});

Route::prefix('users')->group(function(){
    Route::get('/',[UserController::class,'index']);
    Route::get('/{id}',[UserController::class, 'show']);
    Route::put('/{id}',[UserController::class, 'update']);
    Route::post('/',[UserController::class, 'store']);
    Route::delete('/{id}',[UserController::class, 'destroy']);
});