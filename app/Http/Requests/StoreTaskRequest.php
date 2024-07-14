<?php

namespace App\Http\Requests;

use App\Enums\PriorityEnum;
use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:64', 'min:3'],
            'description' => ['required', 'max:128', 'min:3'],
            'status' => ['required', Rule::in(StatusEnum::cases())],
            'priority' => ['required', Rule::in(PriorityEnum::cases())],
            'due_date' => ['date', 'nullable'],
            'project_id' => ['exists:projects,id', 'nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            '*' => 'Os dados que você inseriu estão inválidos.'
        ];
    }
}
