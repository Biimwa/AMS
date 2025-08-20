<?php

namespace Modules\CompetitionManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class TeamMember extends Model
{
    use HasUuid;

    protected $fillable = [
        'team_id', 'name', 'email', 'phone', 'is_asist_student'
    ];

    protected $casts = [
        'is_asist_student' => 'boolean',
    ];
}

