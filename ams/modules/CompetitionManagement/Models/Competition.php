<?php

namespace Modules\CompetitionManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Competition extends Model
{
    use HasUuid;

    protected $fillable = [
        'name', 'description', 'starts_at', 'ends_at', 'created_by_user_id'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];
}

