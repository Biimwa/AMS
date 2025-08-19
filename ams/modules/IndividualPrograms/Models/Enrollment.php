<?php

namespace Modules\IndividualPrograms\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Enrollment extends Model
{
    use HasUuid;

    protected $fillable = [
        'program_period_id', 'student_name', 'parent_name', 'parent_phone', 'parent_email', 'status', 'knowledge_group'
    ];
}

