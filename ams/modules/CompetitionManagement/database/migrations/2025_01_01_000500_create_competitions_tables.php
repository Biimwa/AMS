<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->uuid('created_by_user_id')->nullable();
            $table->timestamps();
        });

        Schema::create('competition_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->json('constraints')->nullable();
            $table->timestamps();
            $table->index('competition_id');
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id');
            $table->uuid('competition_category_id')->nullable();
            $table->string('name');
            $table->text('project_description')->nullable();
            $table->uuid('coach_user_id')->nullable();
            $table->boolean('is_external')->default(false);
            $table->timestamps();
            $table->index(['competition_id', 'competition_category_id']);
        });

        Schema::create('team_members', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('team_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_asist_student')->default(true);
            $table->timestamps();
            $table->index('team_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('competition_categories');
        Schema::dropIfExists('competitions');
    }
};

