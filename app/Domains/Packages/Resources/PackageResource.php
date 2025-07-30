<?php

namespace Domains\Packages\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Domains\Exams\Resources\ExamResource;

/**
 * @property-read \Domains\Packages\Models\Package $resource
 */
class PackageResource extends JsonResource
{
    /**
     * Transforms the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'exams' => ExamResource::collection($this->whenLoaded('exams')),
        ];
    }
}
