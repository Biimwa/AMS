<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\UserManagement\Database\seeders\RolesAndPermissionsSeeder;
use Modules\Curriculum\Database\seeders\CurriculumSeeder;
use Modules\IndividualPrograms\Database\seeders\ProgramsSeeder;
use Illuminate\Support\Facades\Hash;
use Modules\UserManagement\Models\User;

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

        // Create seeded admin users
        if (! User::where('email', 'founder@ams.local')->exists()) {
            $founder = User::create([
                'name' => 'AMS Founder',
                'email' => 'founder@ams.local',
                'password' => Hash::make('password'),
                'is_coach' => false,
            ]);
            $founder->assignRole('Founder');
        }
        if (! User::where('email', 'admin@ams.local')->exists()) {
            $admin = User::create([
                'name' => 'AMS Admin',
                'email' => 'admin@ams.local',
                'password' => Hash::make('password'),
                'is_coach' => false,
            ]);
            $admin->assignRole('CEO');
        }
    }
}
