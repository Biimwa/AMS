# AMS
<?php

// Laravel Modular Starter: Asist Management System (AMS)

// Directory structure suggestion:
// - app/Modules/
//   - Users/
//   - Schools/
//   - Students/
//   - Programs/
//   - Lessons/
//   - Projects/
//   - Competitions/
//   - Events/
//   - Reports/
//   - Complaints/
//   - Messages/

// Composer.json
// Use Laravel Modules or DDD structure with PSR-4 autoloading

// ============================
// MIGRATIONS & MODELS SAMPLES
// ============================

// USERS MODULE
Schema::create('users', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('phone')->nullable();
    $table->string('password');
    $table->timestamps();
});

// ROLES (Spatie)
// Role and model_has_roles managed by package

// SCHOOLS
Schema::create('schools', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->string('name');
    $table->string('type'); // Primary, Secondary, International
    $table->string('location');
    $table->timestamps();
});

// CLUBS
Schema::create('clubs', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('school_id');
    $table->string('name')->default('STEM Robotics Club');
    $table->timestamps();
});

// STUDENTS
Schema::create('students', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('school_id')->nullable();
    $table->uuid('parent_id')->nullable();
    $table->string('name');
    $table->string('age_group');
    $table->string('status')->default('active');
    $table->timestamps();
});

// PROGRAMS
Schema::create('programs', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->string('title');
    $table->enum('type', ['Holiday', 'Summer Camp', 'Weekend', 'Vacist']);
    $table->date('start_date');
    $table->date('end_date');
    $table->timestamps();
});

// ENROLLMENTS
Schema::create('enrollments', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('student_id');
    $table->uuid('program_id');
    $table->uuid('coach_id')->nullable();
    $table->uuid('group_id')->nullable();
    $table->timestamps();
});

// CATEGORIES (Curriculum)
Schema::create('categories', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->string('title');
    $table->text('description')->nullable();
    $table->timestamps();
});

// LESSONS
Schema::create('lessons', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('group_id');
    $table->uuid('coach_id');
    $table->uuid('category_id');
    $table->date('date');
    $table->text('plan');
    $table->timestamps();
});

// REPORTS
Schema::create('reports', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('lesson_id');
    $table->uuid('student_id');
    $table->text('feedback');
    $table->string('performance');
    $table->timestamps();
});

// PROJECTS
Schema::create('projects', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('student_id')->nullable();
    $table->uuid('group_id')->nullable();
    $table->uuid('category_id');
    $table->string('title');
    $table->text('description');
    $table->string('file_path')->nullable();
    $table->timestamps();
});

// COMPETITIONS
Schema::create('competitions', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->string('title');
    $table->date('date');
    $table->timestamps();
});

// COMPETITION CATEGORIES
Schema::create('competition_categories', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('competition_id');
    $table->string('title');
    $table->timestamps();
});

// TEAMS
Schema::create('teams', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->string('name');
    $table->uuid('competition_id');
    $table->uuid('category_id');
    $table->uuid('coach_id');
    $table->text('project_description');
    $table->timestamps();
});

// TEAM MEMBERS
Schema::create('team_members', function (Blueprint $table) {
    $table->uuid('id');
    $table->uuid('team_id');
    $table->uuid('student_id');
    $table->timestamps();
});

// EVENTS
Schema::create('events', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->string('title');
    $table->string('type'); // National, Marketing
    $table->date('date');
    $table->text('description');
    $table->timestamps();
});

// CONTACTS
Schema::create('contacts', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('event_id');
    $table->string('name');
    $table->string('phone');
    $table->string('email')->nullable();
    $table->timestamps();
});

// COMPLAINTS
Schema::create('complaints', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('user_id')->nullable();
    $table->string('name')->nullable();
    $table->string('contact')->nullable();
    $table->text('message');
    $table->timestamps();
});

// MESSAGES (Internal Messaging)
Schema::create('messages', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->uuid('from_user_id');
    $table->uuid('to_user_id');
    $table->text('message');
    $table->boolean('read')->default(false);
    $table->timestamps();
});

// ============================
// SYSTEM PREVIEW (UI / Filament)
// ============================

// Use Filament Panel for admin dashboard.
// Create dedicated panels:
// - Admin Panel (CEO, Director, Founder)
// - Coach Panel
// - Student/Parent Preview Panel (view reports, lessons, projects)
// - Public Complaint Page (no login required)

// Optionally expose RESTful APIs for mobile or frontend apps later.
