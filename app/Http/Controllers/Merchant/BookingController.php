<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Model\Merchant\TourPhoModel;
use App\Model\Merchant\TourModel;
use App\Model\Merchant\Profile;


class BookingController extends Controller
{
    public function index(Request $req) {

        $merchantProfile = $this->getMyMerchant(Auth::user()->id);
        $bookData = $this->getAllBooking($merchantProfile[0]['id'],$req->service,$req->payment,$req->status,$req->refid);
        $service_name = null;
        $service_post = null;
        // return $bookData;
        return view('merchant_dashboard.book.book_index',compact(['bookData', 'service_name', 'service_post']));
    }

    protected function getAllBooking($id,$service,$payment,$status,$refid)
    {
        
        $bookingDetails = new TourModel();
        $bookingDetails = $bookingDetails->where('service_tour.profid', $id);
        $bookingDetails = $bookingDetails->join('payments', 'payments.pm_page_id' , 'service_tour.id');
        $bookingDetails = $bookingDetails->join('status_payment', 'status_payment.ps_id', '=', 'payments.pm_ps_id');
        if($service != 'service'){
            $bookingDetails = $bookingDetails->where('service_tour.service_id', $service);
        }
        
        if($refid != 'refid'){
            $bookingDetails = $bookingDetails->where('status_payment.ps_ref_no', $refid);
        }
   
        if($status != 'status'){
            $bookingDetails = $bookingDetails->where('status_payment.ps_payment_status', $status);
        }

        if($payment != 'payment'){
            $bookingDetails = $bookingDetails->where('status_payment.ps_payment_code', $payment);
        }
        $bookingDetails = $bookingDetails->paginate(8);

        return $bookingDetails;
    }
    protected function getMyMerchant($id)
    {
       $merchantProfile = new Profile();
       $merchantProfile = $merchantProfile->where('user_id', $id);
       return $merchantProfile->get();
    }
}
