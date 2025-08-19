<?php

namespace Modules\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Lesson extends Model
{
    use HasUuid;

    protected $fillable = [
        'category_id', 'title', 'content', 'verified_by_user_id', 'verified_at'
    ];

    protected $casts = [
        'verified_at' => 'datetime',
    ];
}

