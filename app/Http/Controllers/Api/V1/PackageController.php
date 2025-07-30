<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePackageRequest;
use Domains\Packages\DTOs\PackageDTO;
use Domains\Packages\Services\PackageService as ServicesPackageService;

class PackageController extends Controller
{
    public function __construct(
        protected ServicesPackageService $service
    ) {}

    public function index()
    {
        return $this->service->index();
    }

    public function store(StorePackageRequest $request)
    {
        $dto = new PackageDTO(
            name: $request->string('name'),
            exams: $request->input('exams', [])
        );

        return $this->service->store($dto);
    }
}
