<?php

use App\Http\Controllers\MonHocController;
use Illuminate\Support\Facades\Route;


Route::get('/monhocs', [MonHocController::class, 'index']);
Route::get('/monhocs/{monhoc}', [MonHocController::class, 'show']);
Route::post('/monhocs', [MonHocController::class, 'store']);
Route::put('/monhocs/{monhoc}', [MonHocController::class, 'update']);
Route::delete('/monhocs/{monhoc}', [MonHocController::class, 'destroy']);