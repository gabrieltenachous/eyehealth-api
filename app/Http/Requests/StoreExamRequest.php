<?php

namespace App\Http\Requests;

use App\Enums\ExamGroup;
use App\Enums\Laterality;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreExamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // sem auth por enquanto
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'comment' => ['required', 'string'],
            'laterality' => ['nullable', new Enum(Laterality::class)],
            'group' => ['required', new Enum(ExamGroup::class)],
        ];
    }
}
