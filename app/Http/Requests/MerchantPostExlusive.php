<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchantPostExlusive extends FormRequest
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
            'tour_package_name'=>'required',
            'price'=>'required',
            'no_night'=>'required',
            'no_guest'=>'required',
            'quantity'=>'required',
            'tour_package_desc'=>'required',
            'what_expect'=>'required',
            'cancelation'=>'required',
            'facilities'=>'required',
            'package'=>'required',
            'address'=>'required',
            'country'=>'required',
            'province'=>'required',
            'place'=>'required',
        ];
    }
}
