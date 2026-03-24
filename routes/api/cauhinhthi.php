<?php

use App\Http\Controllers\CauHinhThiController;
use Illuminate\Support\Facades\Route;

Route::get('/cauhinhthis', [CauHinhThiController::class, 'index']);
Route::get('/cauhinhthis/{cauhinhthi}', [CauHinhThiController::class, 'show']);
Route::post('/cauhinhthis', [CauHinhThiController::class, 'store']);
Route::put('/cauhinhthis/{cauhinhthi}', [CauHinhThiController::class, 'update']);
Route::delete('/cauhinhthis/{cauhinhthi}', [CauHinhThiController::class, 'destroy']);
