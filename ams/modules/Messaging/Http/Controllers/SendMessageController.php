<?php

namespace Modules\Messaging\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Messaging\Models\Message;

class SendMessageController
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'recipient_user_id' => ['required', 'uuid'],
            'subject' => ['nullable', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $this->authorize($request);

        $message = Message::create([
            'sender_user_id' => $request->user()->id,
            'recipient_user_id' => $data['recipient_user_id'],
            'subject' => $data['subject'] ?? null,
            'body' => $data['body'],
        ]);

        return response()->json(['id' => $message->id], 201);
    }

    protected function authorize(Request $request): void
    {
        // CEOs can message anyone; coaches can message within scope; keep minimal for now
        if (! $request->user()) {
            abort(403);
        }
    }
}

