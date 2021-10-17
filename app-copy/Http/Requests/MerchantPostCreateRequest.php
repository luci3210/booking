<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchantPostCreateRequest extends FormRequest
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
            'address' => 'required|max:500',
            // 'country' => 'required|numeric',
            // 'region' => 'required|numeric',
            // 'district' => 'required|numeric',
            // 'city' => 'required|numeric',
            // 'municipality' => 'required|numeric',
            // 'barangay' => 'required|numeric',
        ];
    }
}
