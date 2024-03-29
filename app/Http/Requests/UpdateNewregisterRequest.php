<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewregisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'vocabulary' => [
                'required', 'string',
            ], 
            'translate' => [
                'required', 'string',
            ],
            'note' => [
                'required', 'string',
            ],
            'type' => [
                'required', 'string',
            ],
            'user_id' => [
               
            ],
            'lang_id' => [
               
            ],
        ];
    }
}
