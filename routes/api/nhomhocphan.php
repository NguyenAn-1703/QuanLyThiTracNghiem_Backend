<?php

use App\Http\Controllers\NhomHocPhanController;
use Illuminate\Support\Facades\Route;


Route::get('/nhomhocphans', [NhomHocPhanController::class, 'index']);
Route::get('/nhomhocphans/{nhomhocphan}', [NhomHocPhanController::class, 'show']);
Route::post('/nhomhocphans', [NhomHocPhanController::class, 'store']);
Route::put('/nhomhocphans/{nhomhocphan}', [NhomHocPhanController::class, 'update']);
Route::delete('/nhomhocphans/{nhomhocphan}', [NhomHocPhanController::class, 'destroy']);