<?php

use App\Http\Controllers\DeThiController;
use Illuminate\Support\Facades\Route;


Route::get('/dethis', [DeThiController::class, 'index']);
Route::get('/dethis/{dethi}', [DeThiController::class, 'show']);
Route::post('/dethis', [DeThiController::class, 'store']);
Route::put('/dethis/{dethi}', [DeThiController::class, 'update']);
Route::delete('/dethis/{dethi}', [DeThiController::class, 'destroy']);

Route::get('/get_osvien/{user}', [DeThiController::class, 'get_osvien']);
