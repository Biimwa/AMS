<?php

use Illuminate\Support\Facades\Route;
use Modules\UserManagement\Http\Controllers\Auth\RegisterController;

Route::post('/register', RegisterController::class);

