<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use App\Enums\ExamGroup;
use App\Enums\Laterality;

class StoreExamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // sem auth por enquanto
    }

    public function rules(): array
    {
        return [
            'name'       => ['required', 'string'],
            'comment'    => ['required', 'string'],
            'laterality' => ['nullable', new Enum(Laterality::class)],
            'group'      => ['required', new Enum(ExamGroup::class)],
        ];
    }
}
