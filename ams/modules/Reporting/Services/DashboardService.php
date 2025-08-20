<?php

namespace Modules\Reporting\Services;

use Illuminate\Support\Facades\DB;

class DashboardService
{
    public function getSummaryCounts(): array
    {
        return [
            'users' => (int) DB::table('users')->count(),
            'schools' => (int) DB::table('schools')->count(),
            'programs' => (int) DB::table('programs')->count(),
            'competitions' => (int) DB::table('competitions')->count(),
            'events' => (int) DB::table('events')->count(),
        ];
    }
}

