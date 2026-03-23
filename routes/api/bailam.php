<?php

use App\Http\Controllers\BaiLamController;
use Illuminate\Support\Facades\Route;


Route::get('/bailams', [BaiLamController::class, 'index']);
Route::get('/bailams/{bailam}', [BaiLamController::class, 'show']);
Route::post('/bailams', [BaiLamController::class, 'store']);
Route::put('/bailams/{bailam}', [BaiLamController::class, 'update']);
Route::delete('/bailams/{bailam}', [BaiLamController::class, 'destroy']);

Route::post('/bailams/starttest', [BaiLamController::class, 'starttest']);
Route::put('/bailams/updatestudenttest/{bailam}', [BaiLamController::class, 'updatestudenttest']);