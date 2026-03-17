<?php

use App\Http\Controllers\GiaoBaiThiController;
use Illuminate\Support\Facades\Route;


Route::get('/giaobaithis', [GiaoBaiThiController::class, 'index']);
Route::get('/giaobaithis/{giaobaithi}', [GiaoBaiThiController::class, 'show']);
Route::post('/giaobaithis', [GiaoBaiThiController::class, 'store']);
Route::put('/giaobaithis/{giaobaithi}', [GiaoBaiThiController::class, 'update']);
Route::delete('/giaobaithis/{giaobaithi}', [GiaoBaiThiController::class, 'destroy']);