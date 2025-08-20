<?php

namespace Modules\ComplaintManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Complaint extends Model
{
    use HasUuid;

    protected $fillable = [
        'submitted_by_user_id', 'subject', 'body', 'is_anonymous', 'visibility_roles'
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'visibility_roles' => 'array',
    ];
}

