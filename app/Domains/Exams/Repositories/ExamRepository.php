<?php

namespace Domains\Exams\Repositories;

use Domains\Exams\Models\Exam;

/**
 * Repertoire for exam persistence.
 */
class ExamRepository
{
    /**
     * @param array $data
     * @return Exam
     */
    public function store(array $data): Exam
    {
        return Exam::create($data);
    }

    /**
     * @param string $id
     * @return Exam|null
     */
    public function find(string $id): ?Exam
    {
        return Exam::find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Exam::all();
    }
}
