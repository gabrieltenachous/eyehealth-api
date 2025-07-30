<?php

namespace Domains\Exams\Repositories;

use Domains\Exams\Models\Package;

class PackageRepository
{
    public function store(array $data): Package
    {
        return Package::create($data);
    }

    public function find(string $id): ?Package
    {
        return Package::find($id);
    }

    public function all()
    {
        return Package::all();
    }
}
