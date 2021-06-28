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

use App\Model\Merchant\TourPhoModel;
use App\Model\Merchant\TourModel;

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
        
        $hotelList = $this->getAllMyBookingHotel($req->service,$req->payment,$req->status);
        // /.users info
        $data['data']['account'] = $account;
        $data['data']['country'] = $country;
        // return $hotelList;
        return view('tourismo.account.account_booking_index',compact("hotelList", "tourList","data"));

    }

    protected function getAllMyBookingHotel($service,$payment,$status)
    {
       $hotelList = new PaymentModel();
       $hotelList = $hotelList->where('pm_user_id',Auth::user()->id);
       $hotelList = $hotelList->join('status_payment', 'status_payment.ps_id', '=', 'payments.pm_ps_id');
       $hotelList = $hotelList->join('service_tour', 'service_tour.id', '=', 'payments.pm_page_id');
       if($service != 'service'){
         $hotelList = $hotelList->where('service_tour.service_id', $service);
       }

        if($status != 'status'){
            $hotelList = $hotelList->where('status_payment.ps_payment_status', $status);
        }
        if($payment != 'payment'){
            $hotelList = $hotelList->where('status_payment.ps_payment_code', $payment);
        }
       
       $hotelList = $hotelList->paginate(10);
       return $hotelList;
       
        
    }

    public function accnt_country() {
        return LocationCountyModel::where('temp_status',1)->get();
    }
}
