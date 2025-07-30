<?php

namespace Database\Seeders;

use Domains\Exams\Models\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    public function run(): void
    {
        Exam::factory()->count(10)->create();
    }
}
