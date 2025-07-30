<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Domains\Exams\Models\Exam;

class PackageEndpointsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withHeader('Authorization', env('API_TOKEN'));
    }

    public function test_can_create_package()
    {
        $exam = Exam::factory()->create();

        $response = $this->postJson('/api/v1/packages', [
            'name' => 'Pré-operatório',
            'exams' => [$exam->id],
        ]);

        $response->assertCreated()
                 ->assertJsonStructure(['data' => ['id', 'name', 'exams']]);
    }

    public function test_can_list_packages()
    {
        $response = $this->getJson('/api/v1/packages');
        $response->assertOk()->assertJsonStructure(['data']);
    }
}
