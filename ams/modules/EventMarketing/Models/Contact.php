<?php

namespace Modules\EventMarketing\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Contact extends Model
{
    use HasUuid;

    protected $fillable = [
        'event_id', 'name', 'email', 'phone', 'source_notes'
    ];
}

