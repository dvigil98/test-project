<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'project_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'project_id.required' => 'El proyecto es requerido',
            'name.required' => 'El nombre es requerido',
            'description' => 'La descripcion es requerida'
        ];
    }
}
