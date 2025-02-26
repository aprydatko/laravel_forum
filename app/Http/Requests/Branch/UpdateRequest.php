<?php

namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'section_id' => 'required|integer|exists:sections,id',
            'parent_id' => 'nullable|integer|exists:branches,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле title необходимо для заполнения',
            'section_id.required' => 'Поле section_id необходимо для заполнения'
        ];
    }
}
