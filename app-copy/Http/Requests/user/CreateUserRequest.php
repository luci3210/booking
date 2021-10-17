<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required', 'min:5','string', 'unique:users'],
            'pnumber'=> ['required','min:11', 'string', 'unique:users'],
            // 'password'=> ['required', 'string'],
        ];
    }
}
