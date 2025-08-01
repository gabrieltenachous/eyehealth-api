<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\ExamGroup;
use App\Enums\Laterality;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBulkExamRequest;
use App\Http\Requests\StoreExamRequest;
use Domains\Exams\DTOs\ExamDTO;
use Domains\Exams\Resources\ExamResource;
use Domains\Exams\Services\ExamService;

class ExamController extends Controller
{
    public function __construct(
        protected ExamService $service
    ) {}

    /**
     * @OA\Get(
     *     path="/api/v1/exams",
     *     security={{"apiToken":{}}},
     *     tags={"Exams"},
     *     summary="Listar exames",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Lista de exames"
     *     )
     * )
     */
    public function index()
    {
        return $this->service->index();
    }

    /**
     * @OA\Post(
     *     path="/api/v1/exams",
     *     security={{"apiToken":{}}},
     *     tags={"Exams"},
     *     summary="Criar novo exame",
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             required={"name", "group", "comment"},
     *
     *             @OA\Property(property="name", type="string", example="Campimetria"),
     *             @OA\Property(property="comment", type="string", example="Exame de campo visual"),
     *             @OA\Property(property="laterality", type="string", enum={"OD", "OE", "AO"}, example="OD"),
     *             @OA\Property(property="group", type="string", enum={"Individual", "Grupo1", "Grupo2", "Grupo3"}, example="Grupo1")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Exame criado"
     *     )
     * )
     */
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

    public function bulkStore(StoreBulkExamRequest $request)
    {
        $exams = collect($request->validated('exams'))
            ->map(function (array $data) {
                return $this->service->store(new ExamDTO(
                    name: $data['name'],
                    laterality: isset($data['laterality']) ? Laterality::from($data['laterality']) : null,
                    comment: $data['comment'] ?? '',
                    group: ExamGroup::from($data['group']),
                ));
            });

        return ExamResource::collection($exams);
    }

}
