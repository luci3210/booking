<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Model\Merchant\Profile;
use App\Model\Merchant\UserModel;
use App\Model\Admin\LocationCountyModel;
use App\user\WishlistHotelsRoom;
use App\user\PaymentModel;

class UserBookingController extends Controller
{
    //

    public function index(Request $req)
    {
        $hotelList = null;
        $tourList = null;
        $data['error'] = [];
        $data['msg'] = [];
        $data['data'] = [];
        // /. data declaration


        $country = $this->accnt_country();
        // /. get countries
        $account = UserModel::where('users.id', Auth::user()->id)->get();
        
        $hotelList = $this->getAllMyBookingHotel();
        // /.users info
        $data['data']['account'] = $account;
        $data['data']['country'] = $country;
        return view('tourismo.account.account_booking_index',compact("hotelList", "tourList","data"));

    }

    protected function getAllMyBookingHotel()
    {
       $hotelList = new PaymentModel();
       $hotelList = $hotelList->where('pm_user_id',Auth::user()->id);
       $hotelList = $hotelList->where('pm_temp_status',1);
       $hotelList = $hotelList->where('pm_page_name','hotel');
       $hotelList = $hotelList->join('hotels', 'payments.pm_page_id', '=', 'hotels.id');
       $hotelList = $hotelList->join('merchant_address', 'hotels.address_id', '=', 'merchant_address.id');
       $hotelList = $hotelList->join('status_payment', 'payments.pm_ps_id', '=', 'status_payment.ps_id');
       $hotelList = $hotelList->get();
       return $hotelList;
       
        
    }

    public function accnt_country() {
        return LocationCountyModel::where('temp_status',1)->get();
    }
}
