<?php

use App\Http\Controllers\LogBaiLamController;
use Illuminate\Support\Facades\Route;


// Route::get('/monhocs/get_w_nhp', [LogBaiLamController::class, 'get_w_nhp']);

// Route::get('/monhocs', [LogBaiLamController::class, 'index']);
// Route::get('/monhocs/{monhoc}', [LogBaiLamController::class, 'show']);
// Route::post('/monhocs', [LogBaiLamController::class, 'store']);
Route::put('/logbailams/{bailam}', [LogBaiLamController::class, 'update']);
// Route::delete('/monhocs/{monhoc}', [LogBaiLamController::class, 'destroy']);

