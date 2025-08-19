<?php

namespace Modules\CompetitionManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Team extends Model
{
    use HasUuid;

    protected $fillable = [
        'competition_id', 'competition_category_id', 'name', 'project_description', 'coach_user_id', 'is_external'
    ];

    protected $casts = [
        'is_external' => 'boolean',
    ];
}

