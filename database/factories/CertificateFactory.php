<?php

    namespace Database\Factories;

    use App\Models\Certificate;
    use Illuminate\Database\Eloquent\Factories\Factory;

    class CertificateFactory extends Factory
    {
        protected $model = Certificate::class;

        public function definition(): array
        {
            return [
                'user_id' => $this->faker->word(),
            ];
        }
    }
