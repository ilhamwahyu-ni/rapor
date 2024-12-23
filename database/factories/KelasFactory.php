<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kelas;
use App\Models\School;

class KelasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kelas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'class_teacher' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'tahfizh_teacher' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'school_id' => School::factory(),
        ];
    }
}
