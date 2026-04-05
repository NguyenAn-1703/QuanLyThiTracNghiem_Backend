<?php

use App\Http\Controllers\CauHoiController;
use Illuminate\Support\Facades\Route;

Route::get('/cauhois', [CauHoiController::class, 'index']);
Route::get('/cauhois/all_public', [CauHoiController::class, 'getAllPublic']);
Route::get('/cauhois/o_gvien/{user}', [CauHoiController::class, 'getAllOfUser']);
Route::get('/cauhois/get_w_private/{user}', [CauHoiController::class, "getWithPrivate"]);

Route::get('/cauhois/{cauhoi}', [CauHoiController::class, 'show']);
Route::post('/cauhois', [CauHoiController::class, 'store']);
Route::put('/cauhois/{cauhoi}', [CauHoiController::class, 'update']);
Route::delete('/cauhois/{cauhoi}', [CauHoiController::class, 'destroy']);
Route::patch('/cauhois/{cauhoi}/status', [CauHoiController::class, 'changeStatus']);
Route::post('/cauhois/{cauhoi}/copy', [CauHoiController::class, 'copyFromPublic']);
