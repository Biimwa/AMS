<?php

namespace Modules\UserManagement\Filament\Resources\UserResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Modules\UserManagement\Filament\Resources\UserResource;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;
}

