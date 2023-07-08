<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId("current_team_id")->nullable();
            $table->string("name");
            $table->string("email")->unique();
            $table->string("interest")->nullable();
            $table->string("headline")->nullable();
            $table
                ->string("phone")
                ->unique()
                ->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
//            $table->string("country")->default("United States");
            $table->string("linkedin_link")->nullable();
            $table->string("github_link")->nullable();
            $table->string("stackoverflow_link")->nullable();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("password");
            $table->rememberToken();
            $table->string("profile_photo_path", 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
