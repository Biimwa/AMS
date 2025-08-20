<?php

namespace Modules\UserManagement\Repositories;

use Modules\Shared\Contracts\RepositoryInterface;
use Modules\UserManagement\Models\User;

class UserRepository implements RepositoryInterface
{
    public function findById(string $id): ?User
    {
        return User::find($id);
    }

    public function create(array $attributes): User
    {
        return User::create($attributes);
    }

    public function update(string $id, array $attributes): ?User
    {
        $user = $this->findById($id);
        if (! $user) {
            return null;
        }
        $user->update($attributes);
        return $user;
    }

    public function delete(string $id): bool
    {
        return (bool) User::whereKey($id)->delete();
    }
}

