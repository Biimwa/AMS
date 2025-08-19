<?php

namespace Modules\EventMarketing\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Event extends Model
{
    use HasUuid;

    protected $fillable = [
        'name', 'type', 'location', 'starts_at', 'ends_at', 'notes'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];
}

