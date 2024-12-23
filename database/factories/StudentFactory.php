<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kelas;
use App\Models\School;
use App\Models\Student;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'student_id' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'gender' => $this->faker->randomElement(["laki-laki", "Perempuan"]),
            'school_id' => School::factory(),
            'kelas_id' => Kelas::factory(),
        ];
    }
}
