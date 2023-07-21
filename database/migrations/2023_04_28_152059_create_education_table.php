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
        Schema::create("education", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained()
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->string("school")->nullable();
            $table->string("link")->nullable();
            $table->string("country")->nullable();
            $table->string("degree")->nullable();
            $table->string("field")->nullable();
            $table->string("month_started")->nullable();
            $table->string("year_started")->nullable();
            $table->string("month_ended")->nullable();
            $table->string("year_ended")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
