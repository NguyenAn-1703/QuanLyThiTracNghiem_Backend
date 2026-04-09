<?php

use App\Http\Controllers\ChuongController;
use Illuminate\Support\Facades\Route;

Route::get('/chuongs', [ChuongController::class, 'index']);
Route::get('/chuongs/{chuong}', [ChuongController::class, 'show']);
Route::post('/chuongs', [ChuongController::class, 'store']);
Route::put('/chuongs/{monhoc}', [ChuongController::class, 'update']);
Route::delete('/chuongs/{chuong}', [ChuongController::class, 'destroy']);
Route::get('/chuongs/o_monhoc/{monhoc}', [ChuongController::class, 'getByMonHoc']);


