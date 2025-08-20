<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Modules\UserManagement\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Super admin override: allow all for Founder & CEO
        Gate::before(function (?User $user, string $ability) {
            if (! $user) return null;
            return $user->hasAnyRole(['Founder', 'CEO']) ? true : null;
        });
    }
}
