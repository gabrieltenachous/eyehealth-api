<?php

namespace Database\Factories;

use App\Enums\ExamGroup;
use App\Enums\Laterality;
use Domains\Exams\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    protected $model = Exam::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'comment' => $this->faker->sentence(),
            'group' => $this->faker->randomElement(ExamGroup::cases()),
            'laterality' => $this->faker->randomElement([null, ...Laterality::cases()]),
        ];
    }
}
