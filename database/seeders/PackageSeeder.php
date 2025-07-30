<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domains\Packages\Models\Package;
use Domains\Exams\Models\Exam;
use Str; 

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $exams = Exam::inRandomOrder()->take(5)->pluck('id');

        Package::factory()
            ->count(3)
            ->create()
            ->each(function ($package) use ($exams) {
                $package->exams()->syncWithoutDetaching(
                    collect($exams)->mapWithKeys(fn ($examId) => [
                        $examId => ['id' => Str::uuid()],
                    ])->toArray()
                );
            });
    }
}
