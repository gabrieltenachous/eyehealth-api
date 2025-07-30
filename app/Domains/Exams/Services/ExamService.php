<?php

namespace Domains\Exams\Services;

use Domains\Exams\DTOs\ExamDTO;
use Domains\Exams\Events\ExamCreated;
use Domains\Exams\Repositories\ExamRepository;
use Domains\Exams\Resources\ExamResource;

/**
 * Service responsible for the Exams business rules.
 */
class ExamService
{
    public function __construct(
        protected ExamRepository $repository
    ) {}

    /**
     * Creates a new exam.
     */
    public function store(ExamDTO $dto): ExamResource
    {
        $exam = $this->repository->store([
            'name' => $dto->name,
            'comment' => $dto->comment,
            'laterality' => $dto->laterality,
            'group' => $dto->group,
        ]);
        event(new ExamCreated($exam));

        return new ExamResource($exam);
    }

    /**
     * List all exams.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ExamResource::collection($this->repository->all());
    }
}
