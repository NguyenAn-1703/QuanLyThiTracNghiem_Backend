<?php

use App\Http\Controllers\PhanCongController;
use Illuminate\Support\Facades\Route;


Route::get('/phancongs', [PhanCongController::class, 'index']);
Route::post('/phancongs', [PhanCongController::class, 'store']);
Route::delete('/phancongs/{giangvienid}/{monhocid}', [PhanCongController::class, 'destroy']);
Route::get('/phancongs/o_gvien/{user}', [PhanCongController::class, 'get_o_gvien']);

Route::post('/phancongs/addgvienphancong', [PhanCongController::class, 'addPhanCong']);
