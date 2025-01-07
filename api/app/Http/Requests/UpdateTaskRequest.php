<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:70'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:pending,in_progress,completed'],
        ];
    }
}
