<?php

use App\Http\Controllers\NhomHocPhanController;
use Illuminate\Support\Facades\Route;


Route::get('/nhomhocphans', [NhomHocPhanController::class, 'index']);
Route::get('/nhomhocphans/{nhomhocphan}', [NhomHocPhanController::class, 'show']);
Route::post('/nhomhocphans', [NhomHocPhanController::class, 'store']);
Route::put('/nhomhocphans/{nhomhocphan}', [NhomHocPhanController::class, 'update']);
Route::delete('/nhomhocphans/{nhomhocphan}', [NhomHocPhanController::class, 'destroy']);
Route::get('/nhomhocphans/o_svien/{user}', [NhomHocPhanController::class, 'get_o_svien']);
Route::get('/nhomhocphans/get_danh_sach_sinh_vien/{nhomhocphan}', [NhomHocPhanController::class, 'get_danh_sach_sinh_vien']);
Route::get('/nhomhocphans/sinh_vien_export/{nhomhocphan}', [NhomHocPhanController::class, 'sinhVienExport']);
Route::post('/nhomhocphans/sinh_vien_import/{nhomhocphan}', [NhomHocPhanController::class, 'sinhVienImport']);
Route::post('/nhomhocphans/add_sinh_vien_to_nhom/{nhomhocphan}', [NhomHocPhanController::class, 'add_sinh_vien_to_nhom']);
Route::get('/nhomhocphans/w_gvien_mon/{nhomhocphan}', [NhomHocPhanController::class, 'get_w_gvien_mon']);
Route::get('/nhomhocphans/w_dekiemtra/{nhomhocphan}', [NhomHocPhanController::class, 'get_w_dekiemtra']);
Route::post('/nhomhocphans/join_group', [NhomHocPhanController::class, 'join_group']);
Route::patch('/nhomhocphans/reset_invite_code/{nhomhocphan}', [NhomHocPhanController::class, 'resetInviteCode']);
Route::get('/nhomhocphans/assigned/{user}', [NhomHocPhanController::class, 'getAssignedTeaching']);
Route::delete('/nhomhocphans/{nhomhocphan}/sinh-vien', [NhomHocPhanController::class, 'remove_sinh_vien_from_nhom']);