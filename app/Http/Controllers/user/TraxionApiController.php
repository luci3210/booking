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
        $extra = base64_decode($extra);
        $extra = (array)json_decode($extra);

        $contactData = $req->query('contact');
        $contactData = base64_decode($contactData);
        $contactData = (array)json_decode($contactData);

        $cn = $req->query('cn');
        $bdetails = $req->query('details');
        
        $paymentService = new PaymentService();
        $paymentService->updatePaymentStatus($req,$extra,$cn,$bdetails,$contactData);
        return $contactData;
    }

    public function sendToGsp($data)
    {
        
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

        $contactData = $req->query('contact');
        $contactData = base64_decode($contactData);
        $contactData = (array)json_decode($contactData);


      
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

        $contact = $req->query('contact');
        $contact = base64_decode($contact);
        $contact = (array)json_decode($contact);


        $detailsOfBooking = $this->getPackageDetails($bdetails['uid']);
        // return $cdetails;
 
        $pdf = PDF::loadView('invoice.payment_invoice',compact(['extra', 'stausPayment','cdetails','detailsOfBooking', 'contact']));
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


