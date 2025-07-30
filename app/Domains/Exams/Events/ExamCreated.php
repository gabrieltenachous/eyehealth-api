<?php

namespace Domains\Exams\Events;

use Domains\Exams\Models\Exam;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExamCreated
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public Exam $exam
    ) {}
}