<?php

use Illuminate\Support\Facades\Route;
use Modules\UserManagement\Models\User;

Route::middleware(['api', 'auth:sanctum'])->group(function () {
    Route::get('/users', function () {
        return User::query()->with('roles')->paginate(15);
    })->middleware('permission:view users');
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\UserManagement\Http\Controllers\Auth\RegisterController;

Route::post('/register', RegisterController::class);

