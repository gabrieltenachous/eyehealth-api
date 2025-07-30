<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExamRequest;
use Domains\Exams\DTOs\ExamDTO;
use Domains\Exams\Services\ExamService;

class ExamController extends Controller
{
    public function __construct(
        protected ExamService $service
    ) {}

    public function index()
    {
        return $this->service->index();
    }

    public function store(StoreExamRequest $request)
    {
        $dto = new ExamDTO(
            name: $request->string('name'),
            laterality: $request->enum('laterality', \App\Enums\Laterality::class),
            comment: $request->string('comment'),
            group: $request->enum('group', \App\Enums\ExamGroup::class),
        );

        return $this->service->store($dto);
    }
}
