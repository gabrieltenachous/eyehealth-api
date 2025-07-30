<?php

namespace Tests\Unit;

use Tests\TestCase;
use Domains\Exams\Services\ExamService;
use Domains\Exams\Repositories\ExamRepository;
use Domains\Exams\DTOs\ExamDTO;
use App\Enums\Laterality;
use App\Enums\ExamGroup;

class ExamServiceTest extends TestCase
{
    public function test_store_exam()
    {
        $repository = new ExamRepository();
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
