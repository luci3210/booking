<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchantPostBank extends FormRequest
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
            'account_name'=> 'required|max:60',
            'bank_name'=> 'required|numeric',
            'account_num'=> 'required|numeric|unique:bank_accounts,account_number',
        ];
    }

    public function messages() {
        return [
            'account_name.required' => 'Account Name is required',
            'bank_name.required' => 'Bank Name is required',
            'account_num.required' => 'Account Number is required',
            'account_num.unique' => 'Account Number is already in use.',
        ];
    }
}
