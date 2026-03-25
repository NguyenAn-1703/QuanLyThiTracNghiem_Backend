<?php

use App\Http\Controllers\RankingController;

Route::middleware(['throttle:10,1'])->group(function () {
    Route::get('/ranking', [RankingController::class, 'index']);
    Route::post('/ranking', [RankingController::class, 'store']);
    Route::delete('/ranking/{id}', [RankingController::class, 'destroy']);
});