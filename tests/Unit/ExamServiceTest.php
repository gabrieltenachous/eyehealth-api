<?php

namespace Tests\Unit;

use App\Enums\ExamGroup;
use App\Enums\Laterality;
use Domains\Exams\DTOs\ExamDTO;
use Domains\Exams\Repositories\ExamRepository;
use Domains\Exams\Services\ExamService;
use Tests\TestCase;

class ExamServiceTest extends TestCase
{
    public function test_store_exam()
    {
        $repository = new ExamRepository;
        $service = new ExamService($repository);

        $dto = new ExamDTO(
            name: 'Retinografia',
            laterality: Laterality::OE,
            comment: 'Exame digital',
            group: ExamGroup::INDIVIDUAL
        );

        $resource = $service->store($dto);

        $this->assertEquals('Retinografia', $resource->name);
    }
}
