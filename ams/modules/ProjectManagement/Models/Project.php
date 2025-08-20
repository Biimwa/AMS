<?php

namespace Modules\ProjectManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Project extends Model
{
    use HasUuid;

    protected $fillable = [
        'name', 'description', 'owner_type', 'owner_id', 'coach_user_id', 'status'
    ];
}

