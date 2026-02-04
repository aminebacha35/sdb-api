<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\AuthController ;
use App\Http\Controllers\GarageEntryController;

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
    Route::post('/garage-entries/entry',[GarageEntryController::class, 'storeEntry']);
    Route::get('/garage-entries/current', [GarageEntryController::class, 'current']);
    Route::put('/garage-entries/{id}', [GarageEntryController::class, 'update']);
    Route::put('/garage-entries/{id}/exit', [GarageEntryController::class, 'exit']);
    Route::get('/garage-entries/history', [GarageEntryController::class, 'history']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/garage-entries/stats', [GarageEntryController::class, 'stats']);
});
