<?php

use App\Http\Controllers\DeThiController;
use Illuminate\Support\Facades\Route;


Route::get('/dethis', [DeThiController::class, 'index']);
Route::get('/dethis/{dethi}', [DeThiController::class, 'show']);
Route::post('/dethis', [DeThiController::class, 'store']);
Route::post('/dethis/generate_dethis_by_fiter', [DeThiController::class, 'generate_dethis_by_fiter']);
Route::put('/dethis/{dethi}', [DeThiController::class, 'update']);
Route::delete('/dethis/{dethi}', [DeThiController::class, 'destroy']);

Route::get('dethis/get_osvien/{user}', [DeThiController::class, 'get_osvien']);
Route::get('dethis/get_ad/{dethi}', [DeThiController::class, 'get_ad']);

Route::get('dethis/get_by_nhomhocphan_svien/{nhomhocphan}/{user}', [DeThiController::class, 'get_by_nhomhocphan_svien']);
