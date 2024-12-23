<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Tahfizh;

class TahfizhFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tahfizh::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'surah_name' => $this->faker->word(),
            'ayat' => $this->faker->numberBetween(-10000, 10000),
            'score' => $this->faker->numberBetween(-10000, 10000),
            'evaluation_date' => $this->faker->date(),
            'note' => $this->faker->text(),
        ];
    }
}
