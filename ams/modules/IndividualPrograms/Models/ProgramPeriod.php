<?php

namespace Modules\IndividualPrograms\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class ProgramPeriod extends Model
{
    use HasUuid;

    protected $fillable = [
        'program_id', 'name', 'starts_at', 'ends_at'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];
}

