<?php

namespace Domains\Exams\DTOs;

use App\Enums\ExamGroup;
use App\Enums\Laterality;

class ExamDTO
{
    public function __construct(
        public string $name,
        public ?Laterality $laterality,
        public string $comment,
        public ExamGroup $group
    ) {}
}
