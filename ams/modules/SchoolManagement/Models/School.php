<?php

namespace Modules\SchoolManagement\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class School extends Model
{
    use HasUuid;

    protected $fillable = [
        'name', 'type', 'district', 'contact_name', 'contact_email', 'contact_phone'
    ];
}

