<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\UserManagement\Database\seeders\RolesAndPermissionsSeeder;
use Modules\Curriculum\Database\seeders\CurriculumSeeder;
use Modules\IndividualPrograms\Database\seeders\ProgramsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            CurriculumSeeder::class,
            ProgramsSeeder::class,
        ]);
    }
}
