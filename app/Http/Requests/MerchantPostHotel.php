<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchantPostHotel extends FormRequest
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
            'room_name'=>'required',
            'room_description'=>'required',
            'price'=>'required',
            'no_night'=>'required',
            'no_guest'=>'required',
            'quantity'=>'required',

            'room_size'=>'required',
            'views'=>'required',
            'number_bed'=>'required',
            
            'room_facilities'=>'required',
            'buiding_facilities'=>'required',
            'booking_package'=>'required',
            
            'address'=>'required',
            'country'=>'required',
            'province'=>'required',
            'place'=>'required',
        ];
    }
}
