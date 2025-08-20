<?php

namespace Modules\UserManagement\Database\seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // Users & Roles
            'manage users', 'view users', 'assign roles', 'message users',

            // Core entities
            'manage schools', 'view schools',
            'manage students', 'view students',
            'manage clubs', 'view clubs',
            'manage groups', 'view groups',
            'manage lessons', 'view lessons', 'verify lessons',
            'manage programs', 'view programs',
            'manage projects', 'view projects',
            'manage competitions', 'view competitions',
            'manage events', 'view events',
            'manage reports', 'view reports',
            'manage complaints', 'view complaints',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        $roles = [
            'Founder' => ['*'],
            'CEO' => ['*'],
            'Director' => ['view *', 'manage reports', 'view complaints'],
            'Head of STEM' => [
                'manage lessons', 'verify lessons', 'manage programs', 'view reports', 'manage competitions', 'manage projects'
            ],
            'Coaches' => [
                'view programs', 'view lessons', 'manage lessons', 'view projects', 'manage projects', 'message users'
            ],
            'IT Admins' => ['manage users', 'view users', 'assign roles', 'manage reports'],
            'Marketing Managers' => ['manage events', 'view events', 'manage reports'],
            'Social Media Managers' => ['view events', 'view reports'],
        ];

        foreach ($roles as $roleName => $perms) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            if (in_array('*', $perms, true)) {
                $role->givePermissionTo(Permission::all());
                continue;
            }
            if (in_array('view *', $perms, true)) {
                $role->givePermissionTo(Permission::where('name', 'like', 'view %')->get());
            }
            foreach ($perms as $perm) {
                if ($perm === 'view *') {
                    continue;
                }
                $permission = Permission::where('name', $perm)->first();
                if ($permission) {
                    $role->givePermissionTo($permission);
                }
            }
        }
    }
}

