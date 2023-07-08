<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(): void
        {
            Schema::create("skill_user", function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger("skill_id");
                $table->unsignedBigInteger("user_id");
                $table->timestamps();

                $table
                    ->foreign("skill_id")
                    ->references("id")
                    ->on("skills")
                    ->onDelete("cascade");
                $table
                    ->foreign("user_id")
                    ->references("id")
                    ->on("users")
                    ->onDelete("cascade");
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(): void
        {
            Schema::dropIfExists("skill_user");
        }
    };
