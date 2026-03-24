<?php

use App\Http\Controllers\CauHinhThiController;
use Illuminate\Support\Facades\Route;

Route::get('/cauhinhthis', [CauHinhThiController::class, 'index']);
Route::get('/cauhinhthis/{cauHinhThi}', [CauHinhThiController::class, 'show']);
Route::post('/cauhinhthis', [CauHinhThiController::class, 'store']);
Route::put('/cauhinhthis/{cauHinhThi}', [CauHinhThiController::class, 'update']);
Route::delete('/cauhinhthis/{cauHinhThi}', [CauHinhThiController::class, 'destroy']);
