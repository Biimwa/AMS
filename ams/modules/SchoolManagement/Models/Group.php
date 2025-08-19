<?php

namespace Modules\SchoolManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Group extends Model
{
    use HasUuid;

    protected $fillable = [
        'club_id', 'name', 'age_band', 'notes'
    ];
}

