<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:departments']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Field name is required. Please write it.",
            'name.unique' => 'Filed name must be unique. Please write it correct.'
        ];
    }
}
