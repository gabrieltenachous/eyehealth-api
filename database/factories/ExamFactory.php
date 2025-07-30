<?php

namespace Database\Factories;

use Domains\Exams\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\ExamGroup;
use App\Enums\Laterality;

class ExamFactory extends Factory
{
    protected $model = Exam::class;

    public function definition(): array
    {
        return [
            'name'       => $this->faker->word(),
            'comment'    => $this->faker->sentence(),
            'group'      => $this->faker->randomElement(ExamGroup::cases()),
            'laterality' => $this->faker->randomElement([null, ...Laterality::cases()]),
        ];
    }
}