## Asist Management System (AMS)

Modular, scalable Laravel-based management system for a Uganda STEM organization. Built with Laravel 11+, Service Layer, Repository Pattern, Spatie Permissions, and Filament Admin.

### Prerequisites
- PHP 8.2+
- Composer 2+
- Node 18+ (for frontend assets if needed)
- SQLite/MySQL/PostgreSQL

### Quick Start (Recommended)
1. Create a fresh Laravel 11 project:
```
composer create-project laravel/laravel ams
```
2. Change into the project directory and require packages:
```
cd ams
composer require spatie/laravel-permission filament/filament livewire/livewire barryvdh/laravel-debugbar maatwebsite/excel laravel/sanctum
```
3. Copy the contents of the `modules/`, `app/Providers/ModulesServiceProvider.php`, `config/modules.php`, `database/seeders/RolesAndPermissionsSeeder.php`, and `composer.json` (merge autoload only) from this repo into your Laravel app.
4. Merge `composer.json` autoload section to include `Modules\\` namespace:
```
"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Modules\\": "modules/"
    }
}
```
Then run:
```
composer dump-autoload
```
5. Publish Spatie Permission config and run migrations:
```
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```
6. Register the modules service provider in `config/app.php` providers array:
```
App\Providers\ModulesServiceProvider::class,
```
7. Seed base roles/permissions and an admin user:
```
php artisan db:seed --class=RolesAndPermissionsSeeder
```

### Core Concepts
- Modular domains under `modules/` using DDD-style layering: `Models`, `Repositories`, `Services`, `Http`, `Filament`, `Database`.
- UUID primary keys everywhere using `Modules\Shared\Traits\HasUuid`.
- Role-based authorization with Spatie. See `Modules\UserManagement\Database\seeders\RolesAndPermissionsSeeder.php`.
- Filament Admin resources per module under `Filament/Resources`.
- Module migrations are auto-registered by `ModulesServiceProvider`.

### Domains (initial scaffolding)
- User Management: Roles, basic messaging, complaints, user profile.
- School Management: Schools, Clubs, Groups, Lessons, Attendance, Reports.
- Individual Programs: Programs, Periods, Enrollments, Progress, Certificates.
- Curriculum: Categories, Lessons, Plans, Verifications, Placements.
- Projects: Projects, Files, Feedback, Evaluations.
- Competitions: Competitions, Categories, Teams, Members.
- Events & Marketing: Events, Contacts, Assignments.
- Reporting & Notifications: Aggregate reporting services and notifications.

This repository contains the AMS domain modules and scaffolding to integrate into a Laravel 11 app. It does not include the full Laravel skeleton. Follow the Quick Start to bootstrap a Laravel app and then merge these modules.

