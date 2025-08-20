<?php

namespace Modules\ProjectManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class ProjectFile extends Model
{
    use HasUuid;

    protected $fillable = [
        'project_id', 'uploaded_by_user_id', 'path', 'original_name', 'mime_type', 'size'
    ];
}

