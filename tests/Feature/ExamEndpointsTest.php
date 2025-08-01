<?php

namespace Tests\Feature;

use App\Enums\ExamGroup;
use App\Enums\Laterality;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExamEndpointsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withHeader('Authorization', env('API_TOKEN'));
    }

    public function test_can_create_exam()
    {
        $response = $this->postJson('/api/v1/exams', [
            'name' => 'Campo Visual',
            'comment' => 'Exame de rotina',
            'laterality' => Laterality::OD->value,
            'group' => ExamGroup::INDIVIDUAL->value,
        ]);

        $response->assertCreated()
            ->assertJsonStructure(['data' => ['id', 'name', 'comment', 'laterality', 'group']]);
    }

    public function test_can_list_exams()
    {
        $response = $this->getJson('/api/v1/exams');
        $response->assertOk()->assertJsonStructure(['data']);
    }
}
