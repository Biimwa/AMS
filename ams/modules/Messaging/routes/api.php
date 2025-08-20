<?php

use Illuminate\Support\Facades\Route;
use Modules\Messaging\Http\Controllers\SendMessageController;
use Modules\Messaging\Http\Controllers\ListMessagesController;
use Modules\Messaging\Http\Controllers\MarkMessageReadController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/messages', SendMessageController::class);
    Route::get('/messages', ListMessagesController::class);
    Route::patch('/messages/{id}/read', MarkMessageReadController::class);
});

