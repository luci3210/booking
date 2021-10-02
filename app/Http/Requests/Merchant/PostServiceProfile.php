<?php

namespace App\Http\Requests\Merchant;

use Illuminate\Foundation\Http\FormRequest;

class PostServiceProfile extends FormRequest
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
            'hotel_name'=>'required',
            'description'=>'required',
            'address'=>'required',
            'country'=>'required',
            'provice'=>'required',
            'city'=>'required',
            'facilities'=>'required',
            'cico'=>'required',
            'extra'=>'required',
            'attraction'=>'required',
            'cpp'=>'required'
        ];
    }

    public function messages() {

        return [

            'hotel_name.required'=>'Hotel name is required',
            'description.required'=>'Hotel description is required',
            'address.required'=>'Hotel address is required',
            'country.required'=>'Country is required',
            'provice.required'=>'Province is required',
            'city.required'=>'City/Municipality is required',
            'facilities.required'=>'Facilities name is required',
            'cico.required'=>'Check In - Check Out Policy is required',
            'extra.required'=>'Children & Extra Bed Policy and Other is required',
            'attraction.required'=>'Hotel attraction is required',
            'cpp.required'=>'Cancellation/Payment Policy is required'

        ];

    }
}
