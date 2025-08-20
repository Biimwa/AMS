<?php

namespace Modules\Messaging\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Messaging\Models\Message;

class MarkMessageReadController
{
    public function __invoke(string $id, Request $request)
    {
        $message = Message::query()->findOrFail($id);
        if ($message->recipient_user_id !== $request->user()->id) {
            abort(403);
        }
        $message->read_at = Carbon::now();
        $message->save();

        return response()->json(['ok' => true]);
    }
}

