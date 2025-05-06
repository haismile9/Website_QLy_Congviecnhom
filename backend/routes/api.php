<?php
use App\Http\Controllers\Api\BoardController;
use App\Http\Controllers\Api\ListColumnController;
use App\Http\Controllers\Api\CardController;

Route::get('/boards', [BoardController::class, 'index']);
Route::get('/boards/{id}', [BoardController::class, 'show']);

Route::post('/lists', [ListController::class, 'store']);
Route::post('/cards', [CardController::class, 'store']);
Route::patch('/cards/{id}', [CardController::class, 'update']);
