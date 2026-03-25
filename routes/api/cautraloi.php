<?php

use App\Http\Controllers\CauTraLoiController;
use Illuminate\Support\Facades\Route;

Route::get('/cautralois', [CauTraLoiController::class, 'index']);
Route::get('/cautralois/{cautraloi}', [CauTraLoiController::class, 'show']);
Route::post('/cautralois', [CauTraLoiController::class, 'store']);
Route::put('/cautralois/{cautraloi}', [CauTraLoiController::class, 'update']);
Route::delete('/cautralois/{cautraloi}', [CauTraLoiController::class, 'destroy']);
