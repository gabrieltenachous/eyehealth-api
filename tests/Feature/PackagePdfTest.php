<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Enums\Laterality;
use App\Enums\ExamGroup;

class PackagePdfTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->withHeader('Authorization', env('API_TOKEN'));
    }
    public function test_generate_pdf_from_exams()
    {
        $payload = [
            'exams' => [
                [
                    'name' => 'Campimetria',
                    'comment' => 'Campo visual',
                    'laterality' => Laterality::AO->value,
                    'group' => ExamGroup::GRUPO_3->value,
                ],
                [
                    'name' => 'Tonometria',
                    'comment' => 'Pressão intraocular',
                    'laterality' => Laterality::OD->value,
                    'group' => ExamGroup::GRUPO_1->value,
                ],
            ]
        ];

        $response = $this->postJson('/api/v1/packages/pdf', $payload);

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'application/pdf');
        $this->assertTrue(str_contains($response->getContent(), '%PDF'));
    }
}
