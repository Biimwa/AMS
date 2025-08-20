<?php

namespace Modules\Shared\Contracts;

interface RepositoryInterface
{
    public function findById(string $id): mixed;

    public function create(array $attributes): mixed;

    public function update(string $id, array $attributes): mixed;

    public function delete(string $id): bool;
}

