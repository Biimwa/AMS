<?php

use Illuminate\Support\Facades\Route;
use Modules\ComplaintManagement\Http\Controllers\SubmitComplaintController;

Route::post('/complaints', [SubmitComplaintController::class, '__invoke']);

