<?php

namespace Modules\UserManagement\Services;

use Illuminate\Support\Facades\Hash;
use Modules\UserManagement\Repositories\UserRepository;
use Modules\UserManagement\Models\User;

class UserService
{
    public function __construct(private readonly UserRepository $users)
    {
    }

    public function register(array $attributes): User
    {
        $attributes['password'] = Hash::make($attributes['password']);
        $attributes['is_coach'] = $attributes['is_coach'] ?? true;
        $user = $this->users->create($attributes);
        $user->assignRole('Coaches');
        return $user;
    }
}

