<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // sem auth por enquanto
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'exams' => ['required', 'array'],
            'exams.*' => ['uuid', 'exists:exams,id'],
        ];
    }
}
