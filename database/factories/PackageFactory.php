<?php

namespace Database\Factories;

use Domains\Packages\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    protected $model = Package::class;

    public function definition(): array
    {
        return [
            'name' => 'Pacote - ' . $this->faker->word(),
        ];
    }
}
