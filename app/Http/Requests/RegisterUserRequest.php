<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'data.username' => 'sometimes|string|required',
            'data.email' => 'sometimes|string',
            'data.password' => 'sometimes|string',
            'data.password2' => 'sometimes|string',
            'data.created_at' => 'sometimes|string',
            'data.updated_at' => 'sometimes|string',
        ];
    }
}
