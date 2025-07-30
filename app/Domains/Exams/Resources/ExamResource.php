<?php

namespace Domains\Exams\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read \Domains\Exams\Models\Exam $resource
 */
class ExamResource extends JsonResource
{
    /**
     * Transforma o resource em array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'comment' => $this->comment,
            'laterality' => $this->laterality,
            'group' => $this->group,
        ];
    }
}
