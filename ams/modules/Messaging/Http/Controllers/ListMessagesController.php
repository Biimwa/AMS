<?php

namespace Modules\Messaging\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Messaging\Models\Message;

class ListMessagesController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'box' => ['nullable', 'in:inbox,sent'],
        ]);

        $box = $request->string('box')->toString() ?: 'inbox';
        $userId = $request->user()->id;

        $query = Message::query();
        if ($box === 'sent') {
            $query->where('sender_user_id', $userId);
        } else {
            $query->where('recipient_user_id', $userId);
        }

        return $query->latest()->paginate(20);
    }
}

