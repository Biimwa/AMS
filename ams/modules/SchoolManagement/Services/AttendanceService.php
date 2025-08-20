<?php

namespace Modules\SchoolManagement\Services;

use Illuminate\Support\Facades\DB;

class AttendanceService
{
    public function takeRollCall(string $groupId, array $studentIdToPresent): void
    {
        DB::table('attendance')->insert(array_map(function ($studentId, $present) use ($groupId) {
            return [
                'id' => (string) \Str::uuid(),
                'group_id' => $groupId,
                'student_id' => $studentId,
                'present' => (bool) $present,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, array_keys($studentIdToPresent), $studentIdToPresent));
    }
}

