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
    public function index() {

        $merchantProfile = $this->getMyMerchant(Auth::user()->id);
        $bookData = $this->getAllBooking($merchantProfile[0]['id']);
        $service_name = null;
        $service_post = null;
        return $bookData;
        return view('merchant_dashboard.book.book_index',compact(['bookData', 'service_name', 'service_post']));
    }

    protected function getAllBooking($id)
    {
        
        $bookingDetails = new TourModel();
        $bookingDetails = $bookingDetails->join('payments', 'payments.pm_page_id' , 'ser');
        $bookingDetails = $bookingDetails->where('service_tour.profid', $id);
        return $bookingDetails->get();
    }
    protected function getMyMerchant($id)
    {
       $merchantProfile = new Profile();
       $merchantProfile = $merchantProfile->where('user_id', $id);
       return $merchantProfile->get();
    }
}
