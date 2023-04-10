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
    // Route::get('/all',[ProductController::class, 'show']);
    Route::post('/create',[ProductController::class, 'store']);
    Route::put('/edit/{id}',[ProductController::class, 'update']);
    Route::delete('/delete/{id}',[ProductController::class, 'destroy']);
});

Route::prefix('transaksi')->group(function(){
    Route::get('/', [TransactionController::class, 'index']);
    Route::post('/create', [TransactionController::class, 'store']);
    Route::put('/edit/{id}', [TransactionController::class, 'update']);
    Route::delete('/delete/{id}', [TransactionController::class, 'destroy']);
});

Route::prefix('order')->group(function(){
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/create', [OrderController::class, 'store']);
    Route::put('/edit/{id}', [OrderController::class, 'update']);
    Route::delete('/delete/{id}', [OrderController::class, 'destroy']);
});

Route::prefix('noti')->group(function(){
    Route::get('/',[NotificationController::class, 'index']);
    Route::put('/edit/{id}',[NotificationController::class, 'update']);
    Route::post('/create',[NotificationController::class, 'store']);
    Route::delete('/delete/{id}',[NotificationController::class, 'destroy']);
});

Route::prefix('users')->group(function(){
    Route::get('/',[UserController::class,'index']);
    Route::put('/edit/{id}',[UserController::class, 'update']);
    Route::post('/create',[UserController::class, 'store']);
    Route::delete('/delete/{id}',[UserController::class, 'destroy']);
});