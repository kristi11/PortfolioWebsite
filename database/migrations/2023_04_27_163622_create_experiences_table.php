<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained()
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->string("position")->nullable();
            $table->string("location")->nullable();
            $table->string("company")->nullable();
            $table->string("link")->nullable();
            $table->string("type")->nullable();
            $table->string("description", 1000)->nullable();
            $table->string("month_start")->nullable();
            $table->string("year_start")->nullable();
            $table->string("month_end")->nullable();
            $table->string("year_end")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
