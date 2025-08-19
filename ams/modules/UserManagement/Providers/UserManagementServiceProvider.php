<?php

namespace Modules\UserManagement\Providers;

use Illuminate\Support\ServiceProvider;

class UserManagementServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Override Laravel auth user model to use module User
        config()->set('auth.providers.users.model', \Modules\UserManagement\Models\User::class);
    }
}

