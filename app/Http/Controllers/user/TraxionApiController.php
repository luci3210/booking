<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Model\Merchant\ProfileModel;


use App\Model\Merchant\TourModel;
use App\Model\Merchant\HotelModel;

use PDF;
class TraxionApiController extends Controller
{
    //

    public function status_callback(Request $req){
        $extra = $req->query('extra');
        $cn = $req->query('cn');
        $bdetails = $req->query('details');
        $extra = base64_decode($extra);
        $extra = (array)json_decode($extra);
        $paymentService = new PaymentService();
        $paymentService->updatePaymentStatus($req,$extra,$cn,$bdetails);
        return 'payment';
    }

    public function indextest(Request $req)
    {
        return 'bobo';
    }

    public function payment_status(Request $req)
    {
        $statusRes = $req->query('payment');
        $extra = $req->query('extra');
        $extra = base64_decode($extra);
        $extra = (array)json_decode($extra);

        $bdetails = $req->query('details');
        $bdetails = base64_decode($bdetails);
        $bdetails = (array)json_decode($bdetails);

      
        return view('payment_traxion.payment_status_callback',compact(['statusRes',]));

    }

    public function invoice_copy(Request $req)
    {
        $extra = $req->query('extra');
        $extra = base64_decode($extra);
        $extra = (array)json_decode($extra);

        $stausPayment = $req->query('status');
        $stausPayment = base64_decode($stausPayment);
        $stausPayment = (array)json_decode($stausPayment);
        $cn = $req->query('cn');
        $cdetails = $this->getProfile($cn);

        $bdetails = $req->query('bdetails');
        $bdetails = base64_decode($bdetails);
        $bdetails = (array)json_decode($bdetails);


        $detailsOfBooking = $this->getPackageDetails($bdetails['uid']);
        // return $detailsOfBooking;
 
        $pdf = PDF::loadView('invoice.payment_invoice',compact(['extra', 'stausPayment','cdetails','detailsOfBooking']));
        return $pdf->download('invoice.pdf');
    }

    protected function getProfile($id){
        $profile = new ProfileModel();
        $profile = $profile->where('id', $id);
        return $profile->get();
    }

    protected function getPackageDetails($id){

        $tourDetails = new TourModel();
        $tourDetails = $tourDetails->where('id', $id);
        $tourDetails = $tourDetails->get();
        return $tourDetails;

    }
}


