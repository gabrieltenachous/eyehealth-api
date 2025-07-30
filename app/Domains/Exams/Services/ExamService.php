<?php

namespace Domains\Exams\Services;

use Domains\Exams\DTOs\ExamDTO;
use Domains\Exams\Repositories\ExamRepository;
use Domains\Exams\Resources\ExamResource;

class ExamService
{
    public function __construct(
        protected ExamRepository $repository
    ) {}

    public function store(ExamDTO $dto): ExamResource
    {
        $exam = $this->repository->store([
            'name'       => $dto->name,
            'comment'    => $dto->comment,
            'laterality' => $dto->laterality,
            'group'      => $dto->group,
        ]);

        return new ExamResource($exam);
    }

    public function index()
    {
        return ExamResource::collection($this->repository->all());
    }
}
