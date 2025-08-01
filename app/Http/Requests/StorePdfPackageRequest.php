<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePdfPackageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'exams' => 'required|array|min:1',
            'exams.*.name' => 'required|string|max:255',
            'exams.*.comment' => 'nullable|string',
            'exams.*.laterality' => 'nullable|string|in:OD,OE,AO',
            'exams.*.group' => 'required|string',
        ];
    }
}
