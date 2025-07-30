<?php

namespace Domains\Exams\DTOs;

use App\Enums\ExamGroup;
use App\Enums\Laterality;

/**
* DTO representing the data from an exam.
*/
class ExamDTO
{
    /**
     * @param string $name
     * @param Laterality|null $laterality
     * @param string $comment
     * @param ExamGroup $group
     */
    public function __construct(
        public string $name,
        public ?Laterality $laterality,
        public string $comment,
        public ExamGroup $group
    ) {}
}
