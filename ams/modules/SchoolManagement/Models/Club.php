<?php

namespace Modules\SchoolManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Club extends Model
{
    use HasUuid;

    protected $fillable = [
        'school_id', 'name', 'description'
    ];
}

