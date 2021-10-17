<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchantPostConfirm extends FormRequest
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
            'ps'=> 'required|numeric',
            'chg_date'=> 'required',
        ];
    }

    public function messages() {
        return [
            'ps.required' => 'Status payment is required',
            'chg_date.required' => 'Date for charge is required',
        ];
    }
}
