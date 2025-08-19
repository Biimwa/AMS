<?php

namespace Modules\Messaging\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Traits\HasUuid;

class Message extends Model
{
    use HasUuid;

    protected $fillable = [
        'sender_user_id', 'recipient_user_id', 'subject', 'body', 'read_at'
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];
}

