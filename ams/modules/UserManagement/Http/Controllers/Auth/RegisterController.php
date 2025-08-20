<?php

namespace Modules\UserManagement\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Modules\UserManagement\Services\UserService;

class RegisterController
{
    public function __invoke(Request $request, UserService $userService)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', PasswordRule::defaults()],
            'phone' => ['nullable', 'string', 'max:32'],
        ]);

        $user = $userService->register($data);

        return response()->json(['id' => $user->id], 201);
    }
}

