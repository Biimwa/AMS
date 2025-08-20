<?php

use Illuminate\Support\Facades\Route;
use Modules\Reporting\Services\DashboardService;
use App\Http\Controllers\AuthController;

Route::view('/', 'app');

// Serve the SPA for all frontend routes like /login, /dashboard, etc.
Route::view('/{any}', 'app')->where('any', '^(?!api|sanctum).*');

// Simple API for the dashboard cards
Route::get('/api/dashboard/summary', function () {
    if (! class_exists(DashboardService::class)) {
        return response()->json([]);
    }
    return response()->json(app(DashboardService::class)->getSummaryCounts());
});

// Session auth endpoints used by the SPA login form
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Fallback to SPA for any unmatched route
Route::fallback(function () {
    return view('app');
});