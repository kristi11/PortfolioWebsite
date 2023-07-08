<?php

    namespace Database\Factories;

    use App\Models\Education;
    use Illuminate\Database\Eloquent\Factories\Factory;

    class EducationFactory extends Factory
    {
        protected $model = Education::class;

        public function definition(): array
        {
            return [
                'user_id' => $this->faker->word(),
            ];
        }
    }
