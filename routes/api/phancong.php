<?php

use App\Http\Controllers\PhanCongController;
use Illuminate\Support\Facades\Route;


Route::get('/phancongs', [PhanCongController::class, 'index']);
Route::post('/phancongs', [PhanCongController::class, 'store']);
Route::delete('/phancongs/{giangvienid}/{monhocid}', [PhanCongController::class, 'destroy']);