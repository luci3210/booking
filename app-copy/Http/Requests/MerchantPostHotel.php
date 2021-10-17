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
            'hotel'=>'required',
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
        ];
    }

    public function messages() {

        return [
            'hotel.required'=>'Hotel name is required',
            'room_name.required'=>'Room name is required',
            'room_description.required'=>'Room description is required',
            'price.required'=>'Price is required',
            'no_night.required'=>'No of night is required',
            'no_guest.required'=>'No of guest is required',
            'quantity.required'=>'Quantity is required',
            'room_size.required'=>'Room size is required',
            'views.required'=>'Room view is required',
            'number_bed.required'=>'Number of bed required',
            'room_facilities.required'=>'Room Amenities is required',
        ];
    }
}
