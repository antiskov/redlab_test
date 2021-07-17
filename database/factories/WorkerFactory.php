<?php

namespace Database\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Worker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sexes = ['male', 'female', 'other'];
        $randomKey = array_rand($sexes);
        return [
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'patronymic' => $this->faker->name().'ic',
            'sex' => $sexes[$randomKey],
            'salary' => rand(1, 1000),
        ];
    }
}
