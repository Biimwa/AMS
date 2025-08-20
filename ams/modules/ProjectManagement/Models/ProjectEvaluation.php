<?php

namespace Modules\ProjectManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class ProjectEvaluation extends Model
{
    use HasUuid;

    protected $fillable = [
        'project_id', 'evaluated_by_user_id', 'score', 'feedback'
    ];
}

