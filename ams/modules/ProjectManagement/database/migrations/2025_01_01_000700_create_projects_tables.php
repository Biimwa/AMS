<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('owner_type'); // student/group
            $table->uuid('owner_id');
            $table->uuid('coach_user_id')->nullable();
            $table->string('status')->default('in_progress');
            $table->timestamps();
            $table->index(['owner_type', 'owner_id']);
        });

        Schema::create('project_files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('project_id');
            $table->uuid('uploaded_by_user_id')->nullable();
            $table->string('path');
            $table->string('original_name');
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->timestamps();
            $table->index('project_id');
        });

        Schema::create('project_evaluations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('project_id');
            $table->uuid('evaluated_by_user_id')->nullable();
            $table->unsignedInteger('score')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();
            $table->index('project_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_evaluations');
        Schema::dropIfExists('project_files');
        Schema::dropIfExists('projects');
    }
};

