<?php

namespace Modules\UserManagement\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\UserManagement\Models\User;

class UserManagementServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Override Laravel auth user model to use module User
        config()->set('auth.providers.users.model', \Modules\UserManagement\Models\User::class);
    }

    public function boot(): void
    {
        User::created(function (User $user) {
            $user->initializeDefaultCoachRole();
        });
    }
}

