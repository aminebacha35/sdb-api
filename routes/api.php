<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\AuthController ;

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
Route::get('/appointments', [AppointmentController::class, 'index']);
Route::post('/appointments', [AppointmentController::class, 'store']);
Route::get('/service-types', [ServiceTypeController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/service-types', [ServiceTypeController::class, 'store']);
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/appointments/{id}', [AppointmentController::class, 'show']);
    Route::put('/appointments/{id}', [AppointmentController::class, 'update']);
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy']);
    Route::delete('/service-types/{id}', [ServiceTypeController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
