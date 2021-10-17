<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPostConfirm extends FormRequest
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
            'amount_paid'=>'required',
            'tourismo_charge'=>'required',
            'tourismo_income'=>'required',
            'merchant_income'=>'required',
            'payment_id'=>'required',
            'payment_status_id'=>'required',
        ];
    }
}
