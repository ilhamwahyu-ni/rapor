<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Tahsin;

class TahsinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tahsin::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'fluency' => $this->faker->numberBetween(75, 100),
            'izhar_harqi' => $this->faker->numberBetween(75, 100),
            'qalqalah' => $this->faker->numberBetween(75, 100),
            'lafaz_jalalah' => $this->faker->numberBetween(75, 100),
            'evaluation_date' => $this->faker->date(),
            'note' => $this->faker->text(),
            'score' => $this->faker->numberBetween(75, 100),
        ];
    }
}
