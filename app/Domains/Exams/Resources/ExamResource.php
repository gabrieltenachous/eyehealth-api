<?php

namespace Domains\Exams\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'comment'    => $this->comment,
            'laterality' => $this->laterality,
            'group'      => $this->group,
        ];
    }
}
