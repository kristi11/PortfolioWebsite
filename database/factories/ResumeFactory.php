<?php

    namespace Database\Factories;

    use App\Models\Resume;
    use Illuminate\Database\Eloquent\Factories\Factory;

    class ResumeFactory extends Factory
    {
        protected $model = Resume::class;

        public function definition(): array
        {
            return [
                'user_id' => $this->faker->word(),
                'file' => $this->faker->word(),
                'resume' => $this->faker->word(),
            ];
        }
    }
