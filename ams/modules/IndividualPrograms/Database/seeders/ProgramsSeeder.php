<?php

namespace Modules\IndividualPrograms\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\IndividualPrograms\Models\Program;

class ProgramsSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            ['name' => 'Holiday Program', 'code' => 'HOL'],
            ['name' => 'Summer Camp', 'code' => 'SUM'],
            ['name' => 'Weekend Program', 'code' => 'WEEK'],
            ['name' => 'Vacist Program', 'code' => 'VAC'],
        ];

        foreach ($programs as $p) {
            Program::firstOrCreate(['code' => $p['code']], [
                'name' => $p['name'],
                'description' => null,
            ]);
        }
    }
}

