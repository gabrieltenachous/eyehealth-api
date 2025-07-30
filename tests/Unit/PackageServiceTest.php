<?php

namespace Tests\Unit;

use Domains\Exams\Models\Exam;
use Domains\Packages\DTOs\PackageDTO;
use Domains\Packages\Repositories\PackageRepository;
use Domains\Packages\Services\PackageService;
use Tests\TestCase;

class PackageServiceTest extends TestCase
{
    public function test_store_package_with_exams()
    {
        $exam = Exam::factory()->create();

        $repository = new PackageRepository;
        $service = new PackageService($repository);

        $dto = new PackageDTO(name: 'Pré-operatório', exams: [$exam->id]);

        $resource = $service->store($dto);

        $this->assertEquals('Pré-operatório', $resource->name);
        $this->assertCount(1, $resource->exams);
    }
}
