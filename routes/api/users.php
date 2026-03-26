<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);
Route::post('/users/changepassword/{user}', [UserController::class, 'changepassword']);
Route::post('/users/resetpassword/{user}', [UserController::class, 'resetpassword']);


// Route::middleware(['auth:api', 'permission:view_users'])->get('/users', [UserController::class, 'index']);
// Route::middleware(['auth:api', 'permission:get1_users'])->get('/users/{user}', [UserController::class, 'show']);