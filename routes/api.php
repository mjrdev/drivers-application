<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AuthController;

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

Route::prefix('/driver')->group(function () {
    Route::post('/new', [DriverController::class, 'store']);
    Route::get('/all', [DriverController::class, 'index']);
    Route::get('/get/{id}', [DriverController::class, 'show']);
    Route::patch('/update/{id}', [DriverController::class, 'update']);
    Route::delete('/delete/{id}', [DriverController::class, 'destroy']);
});

Route::post('/login', [AuthController::class, 'login']);