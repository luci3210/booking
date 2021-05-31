<?php

use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
     public function __construct()
         {
            $this->middleware('auth:web');
         }   
         
    public function addressCreateForm() {


    }

    public function getAddress() {

        return Profile::join('merchant_address','merchant_address.prof_id','=','profiles.id')
                    ->where('merchant_address.temp_status','=','1')
                    ->where('profiles.user_id','=',Auth::user()->id)
                        ->get(['profiles.*','merchant_address.*']);
    }
}
