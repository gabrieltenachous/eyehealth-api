<?php

namespace Domains\Packages\DTOs;

class PackageDTO
{
    public function __construct(
        public string $name,
        public array $exams = [] // UUIDs dos exames
    ) {}
}
