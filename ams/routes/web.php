<?php

use Illuminate\Support\Facades\Route;
use Modules\Reporting\Services\DashboardService;

Route::get('/', function () {
    return view('app');
});

// Catch-all to serve SPA routes
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

Route::get('/api/dashboard/summary', function () {
    if (! class_exists(DashboardService::class)) {
        return response()->json([]);
    }
    return response()->json(app(DashboardService::class)->getSummaryCounts());
});