<?php

namespace Domains\Exams\Repositories;

use Domains\Exams\Models\Exam;

class ExamRepository
{
    public function store(array $data): Exam
    {
        return Exam::create($data);
    }

    public function find(string $id): ?Exam
    {
        return Exam::find($id);
    }

    public function all()
    {
        return Exam::all();
    }
}
