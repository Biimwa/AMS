<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('submitted_by_user_id')->nullable();
            $table->string('subject');
            $table->text('body');
            $table->boolean('is_anonymous')->default(false);
            $table->json('visibility_roles')->nullable();
            $table->timestamps();

            $table->index('submitted_by_user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};

