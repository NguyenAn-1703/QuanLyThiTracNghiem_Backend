<?php

use App\Http\Controllers\DoKhoController;
use Illuminate\Support\Facades\Route;

Route::get('/dokhos', [DoKhoController::class, 'index']);
Route::get('/dokhos/{dokho}', [DoKhoController::class, 'show']);
Route::post('/dokhos', [DoKhoController::class, 'store']);
Route::put('/dokhos/{dokho}', [DoKhoController::class, 'update']);
Route::delete('/dokhos/{dokho}', [DoKhoController::class, 'destroy']);
