<?php

use App\Http\Controllers\ThongBaoController;
use Illuminate\Support\Facades\Route;


Route::get('/thongbaos', [ThongBaoController::class, 'index']);
Route::get('/thongbaos/{thongbao}', [ThongBaoController::class, 'show']);
Route::post('/thongbaos', [ThongBaoController::class, 'store']);
Route::put('/thongbaos/{thongbao}', [ThongBaoController::class, 'update']);
Route::delete('/thongbaos/{thongbao}', [ThongBaoController::class, 'destroy']);