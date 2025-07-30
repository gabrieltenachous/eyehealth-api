<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domains\Exams\Models\Exam;

class ExamSeeder extends Seeder
{
    public function run(): void
    {
        Exam::factory()->count(10)->create();
    }
}
