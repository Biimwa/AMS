<?php

namespace Modules\Curriculum\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Category extends Model
{
    use HasUuid;

    protected $fillable = [
        'name', 'code', 'description'
    ];
}

