<?php

use App\Http\Controllers\NhomHocPhanController;
use Illuminate\Support\Facades\Route;


Route::get('/nhomhocphans', [NhomHocPhanController::class, 'index']);
Route::get('/nhomhocphans/{nhomhocphan}', [NhomHocPhanController::class, 'show']);
Route::post('/nhomhocphans', [NhomHocPhanController::class, 'store']);
Route::put('/nhomhocphans/{nhomhocphan}', [NhomHocPhanController::class, 'update']);
Route::delete('/nhomhocphans/{nhomhocphan}', [NhomHocPhanController::class, 'destroy']);
Route::get('/nhomhocphans/w_gvien_mon/{nhomhocphan}', [NhomHocPhanController::class, 'get_w_gvien_mon']);
Route::get('/nhomhocphans/w_dekiemtra/{nhomhocphan}', [NhomHocPhanController::class, 'get_w_dekiemtra']);