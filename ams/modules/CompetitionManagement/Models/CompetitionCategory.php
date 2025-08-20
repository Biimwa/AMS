<?php

namespace Modules\CompetitionManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class CompetitionCategory extends Model
{
    use HasUuid;

    protected $fillable = [
        'competition_id', 'name', 'description', 'constraints'
    ];

    protected $casts = [
        'constraints' => 'array',
    ];
}

