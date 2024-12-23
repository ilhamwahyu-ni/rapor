<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Report;
use App\Models\Student;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'note' => $this->faker->text(),
            'predicate' => $this->faker->word(),
            'description' => $this->faker->text(),
            'report_date' => $this->faker->date(),
            'semester' => $this->faker->word(),
        ];
    }
}
