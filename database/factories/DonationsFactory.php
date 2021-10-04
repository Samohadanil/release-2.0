<?php

namespace Database\Factories;

use App\Models\Donations;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class DonationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donations::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker\Factory::create();
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'donation' => $this->faker->numberBetween(100, 1000),
            'message' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
