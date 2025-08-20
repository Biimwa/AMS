<?php

use Illuminate\Support\Facades\Route;
use Modules\UserManagement\Models\User;

// Example protected route to demonstrate role middleware usage
Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/admin/users/me', function () {
        /** @var User $user */
        $user = auth()->user();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'roles' => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()->pluck('name'),
        ]);
    });
});

