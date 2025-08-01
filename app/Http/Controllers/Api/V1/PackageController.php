<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\StorePdfPackageRequest;
use Domains\Packages\DTOs\PackageDTO;
use Domains\Packages\Services\PackageService as ServicesPackageService;
use Barryvdh\DomPDF\Facade\Pdf;

class PackageController extends Controller
{
    public function __construct(
        protected ServicesPackageService $service
    ) {}

    /**
     * @OA\Get(
     *     path="/api/v1/packages",
     *     security={{"apiToken":{}}},
     *     tags={"Packages"},
     *     summary="Listar pacotes",
     *
     *     @OA\Response(
     *         response=200,
     *         description="Lista de pacotes"
     *     )
     * )
     */
    public function index()
    {
        return $this->service->index();
    }

    /**
     * @OA\Post(
     *     path="/api/v1/packages",
     *     security={{"apiToken":{}}},
     *     tags={"Packages"},
     *     summary="Criar novo pacote",
     *
     *     @OA\RequestBody(
     *         required=true,
     *
     *         @OA\JsonContent(
     *             required={"name", "exams"},
     *
     *             @OA\Property(property="name", type="string", example="Pré-operatório"),
     *             @OA\Property(property="exams", type="array", @OA\Items(type="string", format="uuid"))
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Pacote criado"
     *     )
     * )
     */
    public function store(StorePackageRequest $request)
    {
        $dto = new PackageDTO(
            name: $request->string('name'),
            exams: $request->input('exams', [])
        );

        return $this->service->store($dto);
    }

    public function generatePdf(StorePdfPackageRequest $request)
    {
        $exams = $request->validated('exams');
        $grouped = array_chunk($exams, 4);

        $pdf = Pdf::loadView('pdf.exams', ['pages' => $grouped]);

        return $pdf->download('exames.pdf');
    }
}
