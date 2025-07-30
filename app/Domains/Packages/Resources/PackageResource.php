<?php

namespace Domains\Packages\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Domains\Exams\Resources\ExamResource;

class PackageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'exams' => ExamResource::collection($this->whenLoaded('exams')),
        ];
    }
}
