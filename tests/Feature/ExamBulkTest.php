<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Enums\Laterality;
use App\Enums\ExamGroup;

class ExamBulkTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->withHeader('Authorization', env('API_TOKEN'));
    }
    public function test_bulk_exam_creation()
    {
        $payload = [
            'exams' => [
                [
                    'name' => 'Exame 1',
                    'comment' => 'Comentário 1',
                    'laterality' => Laterality::OD->value,
                    'group' => ExamGroup::GRUPO_1->value,
                ],
                [
                    'name' => 'Exame 2',
                    'comment' => 'Comentário 2',
                    'laterality' => Laterality::OE->value,
                    'group' => ExamGroup::GRUPO_2->value,
                ],
            ]
        ];

        $response = $this->postJson('/api/v1/exams/bulk', $payload);

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
        $this->assertDatabaseCount('exams', 2);
    }
}
