<?php

namespace Modules\IndividualPrograms\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Program extends Model
{
    use HasUuid;

    protected $fillable = [
        'name', 'code', 'description', 'created_by_user_id'
    ];
}

