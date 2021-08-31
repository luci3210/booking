<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Merchant\ProfileController;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Model\Merchant\TourPhoModel;
use App\Model\Merchant\TourModel;
use App\Model\Merchant\Profile;
use App\Model\PaymentModel;
use App\Model\ConfirmBookingModel;
use App\user\StatusPaymentModel;

use App\Http\Requests\MerchantPostConfirm;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Collection;


use DateTime;



class BookingController extends Controller
{
    private $profile;

    public function __construct(ProfileController $profile) {

        $this->middleware('auth:web');
        $this->profile = $profile;
    }
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

    public function search_status_date(Request $request) {

        $data = PaymentModel::join('service_tour','service_tour.id','payments.pm_page_id')
            ->join('products','service_tour.service_id','products.id')
            ->where( function($query) use($request) {
                $query->from('payments')->where([
                    ['payments.pm_payment_status',$request->status],
                        ['service_tour.profid',$this->profile->profile_check()->id]])
                    ->whereBetween('payments.pm_created_at',[$request->dfrom,$request->dto]);
        })->get();

            
        return view('merchant_dashboard.book.booking',compact('data'));

    }
   public function getdetails($product_name=null,$pm_id=null) {

    $data = PaymentModel::join('service_tour','service_tour.id','payments.pm_page_id')
            ->join('products','service_tour.service_id','products.id')
                 ->join('users','users.id','payments.pm_user_id')
                      ->join('location_country','location_country.location_id','users.country')
                        ->join('charges','charges.chrg_product_id','service_tour.service_id')
             
                ->where( function($query) use($pm_id,$product_name) {
                    $query->from('payments')->where([
                    ['payments.pm_id',$pm_id],
                        ['service_tour.profid',$this->profile->profile_check()->id],
                            ['products.description',$product_name]]);
        })->get();

        $date_fr = new DateTime($data[0]->pm_book_date);
        $date_to = new DateTime($data[0]->pm_book_date_to);
        $interval = $date_fr->diff($date_to);
        $days = $interval->format('%a');

        return view('merchant_dashboard.book.details',compact(['data','days']));

    }


// ----------------------------- new booking ---------------------

public function newbooking() {

    $data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
        ->join('service_tour','service_tour.id','payments.pm_page_id')
                    ->Join('charges_date','charges_date.chg_ps_id','status_payment.ps_id')

        ->where( function($query) {
            $query->from('status_payment')
                 ->where('service_tour.profid',$this->profile->profile_check()->id)
                   ->whereDate('payments.pm_created_at',date('Y-m-d'));
        })->get();

    if(count($data) > 0) {
        return view('merchant_dashboard.book.newbooking',compact(['data']));
    } else {
        return view('merchant_dashboard.book.newbookingNotfound');
    }
}

public function to_confirm($id) {

$data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
        ->join('service_tour','service_tour.id','payments.pm_page_id')
                 ->join('users','users.id','payments.pm_user_id')
             
        ->where( function($query) use($id) {
            $query->from('status_payment')
                ->where('payments.pm_id', $id)
                    ->where('service_tour.profid',$this->profile->profile_check()->id)
                        ->whereDate('payments.pm_created_at',date('Y-m-d'));
        })->first();
 
        return response()->json(['data' => $data]);

    }

public function to_confirmed(MerchantPostConfirm $request) {

    ConfirmBookingModel::create(['chg_ps_id' => $request->ps,'chg_prf_id' => $this->profile->profile_check()->id,'chg_date' => $request->chg_date]);
    
    return redirect()->back()->withSuccess('Booking successfully confirm.');

}


// -------------------------------------- confirm booking ---------------

public function confirmbooking() {

    $data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
        ->join('service_tour','service_tour.id','payments.pm_page_id')
            ->join('users','users.id','payments.pm_user_id')
                ->join('charges_date','charges_date.chg_ps_id','status_payment.ps_id')

        ->where( function($query) {
            $query->from('status_payment')
                 ->where('service_tour.profid',$this->profile->profile_check()->id)
                   ->where('charges_date.chg_id','!=','');
        })->get();

    if(count($data) > 0) {
        return view('merchant_dashboard.book.confirmbooking',compact(['data']));
    } else {
        return view('merchant_dashboard.book.confirmbookingNotfound');
    }
}

public function confirmbooking_detail($id) {

$data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
        ->join('service_tour','service_tour.id','payments.pm_page_id')
                 ->join('users','users.id','payments.pm_user_id')
             
        ->where( function($query) use($id) {
            $query->from('status_payment')
                ->where('payments.pm_id', $id)
                    ->where('service_tour.profid',$this->profile->profile_check()->id);
                        // ->whereDate('payments.pm_created_at',date('Y-m-d'));
        })->first();
 
        return response()->json(['data' => $data]);

    }


// -------------------------------------- today reseved ---------------

public function todaybookingreserved() {

    $data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
        ->join('service_tour','service_tour.id','payments.pm_page_id')
                    ->Join('charges_date','charges_date.chg_ps_id','status_payment.ps_id')
                        ->join('users','users.id','payments.pm_user_id')

        ->where( function($query) {
            $query->from('status_payment')
                 ->where('service_tour.profid',$this->profile->profile_check()->id)
                   ->whereDate('payments.pm_book_date',date('Y-m-d'));
        })->get();

    if(count($data) > 0) {
        return view('merchant_dashboard.book.todaybookingreserved',compact(['data']));
    } else {
        return view('merchant_dashboard.book.todaybookingreservedNotfound');
    }
}


// -------------------------------------- complete booking ---------------


public function completebooking() {

    $data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
        ->join('service_tour','service_tour.id','payments.pm_page_id')
                    ->Join('charges_date','charges_date.chg_ps_id','status_payment.ps_id')
                        ->join('users','users.id','payments.pm_user_id')

        ->where( function($query) {
            $query->from('status_payment')
                 ->where('service_tour.profid',$this->profile->profile_check()->id)
                   ->whereDate('payments.pm_book_date',date('Y-m-d'));
        })->get();

    if(count($data) > 0) {
        return view('merchant_dashboard.book.completebooking',compact(['data']));
    } else {
        return view('merchant_dashboard.book.completebookingNotfound');
    }
}

}