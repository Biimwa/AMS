<?php

namespace Modules\UserManagement\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Modules\Shared\Traits\HasUuid;
use Spatie\Permission\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, HasRoles, HasUuid;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'is_coach'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_coach' => 'boolean',
    ];

    public function initializeDefaultCoachRole(): void
    {
        if ($this->wasRecentlyCreated && $this->is_coach && ! $this->hasRole('Coaches')) {
            $this->assignRole('Coaches');
        }
    }
}

