<?php

namespace Modules\Curriculum\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\Curriculum\Models\Category;

class CurriculumSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Algo Buddy', 'code' => 'ALGO'],
            ['name' => 'Big Builders', 'code' => 'BIGB'],
            ['name' => 'Bricks Challenge', 'code' => 'BRCH'],
            ['name' => 'Vex Robotics', 'code' => 'VEX'],
            ['name' => 'Enjoy AI Robotics', 'code' => 'EAI'],
            ['name' => 'Seamate', 'code' => 'SEA'],
            ['name' => 'Web Development', 'code' => 'WEB'],
            ['name' => 'AI', 'code' => 'AI'],
            ['name' => 'Electronics', 'code' => 'ELEC'],
        ];

        foreach ($categories as $c) {
            Category::firstOrCreate(['code' => $c['code']], [
                'name' => $c['name'],
                'description' => null,
            ]);
        }
    }
}

