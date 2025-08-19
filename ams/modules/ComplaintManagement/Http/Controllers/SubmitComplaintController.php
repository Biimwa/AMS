<?php

namespace Modules\ComplaintManagement\Http\Controllers;

use Illuminate\Http\Request;
use Modules\ComplaintManagement\Models\Complaint;

class SubmitComplaintController
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'is_anonymous' => ['boolean'],
        ]);

        $complaint = Complaint::create([
            'subject' => $data['subject'],
            'body' => $data['body'],
            'is_anonymous' => $data['is_anonymous'] ?? false,
            'submitted_by_user_id' => $request->user()?->id,
            'visibility_roles' => ['CEO', 'Director'],
        ]);

        return response()->json(['id' => $complaint->id], 201);
    }
}

