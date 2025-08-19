<?php

use Illuminate\Support\Facades\Route;
use Modules\Messaging\Http\Controllers\SendMessageController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/messages', SendMessageController::class);
});

