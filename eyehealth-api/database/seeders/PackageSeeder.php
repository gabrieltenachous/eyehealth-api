<?php

namespace Database\Seeders;

use Domains\Exams\Models\Exam;
use Domains\Packages\Models\Package;
use Illuminate\Database\Seeder;
use Str;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $exams = Exam::inRandomOrder()->take(5)->pluck('id');

        Package::factory()
            ->count(3)
            ->create();
    }
}
