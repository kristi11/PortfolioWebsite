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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained()
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->string("name")->nullable();
            $table->string("organization")->nullable();
            $table->string("credentialID")->nullable();
            $table->string("description", 1000)->nullable();
            $table->string("credentialURL")->nullable();
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
        Schema::dropIfExists('certificates');
    }
};
