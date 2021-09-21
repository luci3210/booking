<?php

namespace App\Http\Requests\Merchant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'company'=> 'required|max:200',
            // 'company'=> 'required|max:100|unique:profiles,company',
            'address'=> 'required',
            'about'=> 'required',
            'email'=> 'required',
            // 'email'=> 'required|unique:profiles,email',
            'telno'=> 'required',
            'website'=> 'required'
        ];
    }

    public function messages() {
        return [
            'company.required' => 'Account Name is required',
            // 'company.unique' => 'Merchant name is already registered',
            'address.required' => 'Merchant address is required',
            'about.required' => 'About merchant is required',
            'email.required' => 'Email address is required',
            // 'email.unique' => 'Email address is already registered',
            'telno.required' => 'Tel No./Phone No is required',
            'website.required' => 'Website is required, if you dont have, please add "None"'
        ];
    }
}
