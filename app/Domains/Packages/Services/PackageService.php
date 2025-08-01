<?php

namespace Domains\Packages\Services;

use Domains\Packages\DTOs\PackageDTO;
use Domains\Packages\Repositories\PackageRepository;
use Domains\Packages\Resources\PackageResource;

class PackageService
{
    public function __construct(
        protected PackageRepository $repository
    ) {}

    public function store(PackageDTO $dto): PackageResource
    {
        $package = $this->repository->store([
            'name' => $dto->name,
        ]);

        $package->exams()->attach($dto->exams);

        return new PackageResource($package->load('exams'));
    }

    public function index()
    {
        return PackageResource::collection($this->repository->all());
    }
}
