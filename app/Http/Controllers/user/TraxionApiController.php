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

    public function payment_status(Request $req)
    {
        $statusRes = $req->query('payment');
        $extra = $req->query('extra');
        $extra = base64_decode($extra);
        $extra = (array)json_decode($extra);

        $bdetails = $req->query('details');
        $bdetails = base64_decode($bdetails);
        $bdetails = (array)json_decode($bdetails);

        // $test = 'eyJ1aWQiOiI0OCIsInR5cGUiOiJ0b3VyIn0';
        // $test = base64_decode($test);
        // $test = (array)json_decode($test);

        // $tourDetails = new TourModel();
        // $tourDetails = $tourDetails->where('id', $test['uid']);
        // $tourDetails = $tourDetails->get();
        // $data['name'] = $tourDetails[0]['tour_name'];
        // $data['desc'] = $tourDetails[0]['tour_desc'];
        // $data['expect'] = $tourDetails[0]['tour_expect'];
        // $data['noguest'] = $tourDetails[0]['noguest'];
        // return $data[0]->name;

        // return $test['uid'];

        // $details = [
        //     'title'=> 'Receipt',
        //     'body'=>'helloo thank you'
        // ];

        // Mail::to($extra['user_email'])->send( new TestMail($details) );

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


        $detailsOfBooking = $this->getPackageDetails($bdetails['uid'], $bdetails['type']);
 
        $pdf = PDF::loadView('invoice.payment_invoice',compact(['extra', 'stausPayment','cdetails','detailsOfBooking']));
        return $pdf->download('invoice.pdf');
    }

    protected function getProfile($id){
        $profile = new ProfileModel();
        $profile = $profile->where('id', $id);
        return $profile->get();
    }

    protected function getPackageDetails($id,$type){

        if($type == 'hotel'){
            $hotelDetails = new HotelModel();
            $hotelDetails = $hotelDetails->where('id', $id);
            $hotelDetails = $hotelDetails->get();
            $data['name'] = $hotelDetails[0]['roomname'];
            $data['desc'] = $hotelDetails[0]['roomdesc'];
            $data['expect'] = '';
            $data['noguest'] = $hotelDetails[0]['noguest'];
            $data['nonights'] = $hotelDetails[0]['nonights'];
            return $data;
        }

        if($type == 'tour'){
            $tourDetails = new TourModel();
            $tourDetails = $tourDetails->where('id', $id);
            $tourDetails = $tourDetails->get();
            $data['name'] = $tourDetails[0]['tour_name'];
            $data['desc'] = $tourDetails[0]['tour_desc'];
            $data['expect'] = $tourDetails[0]['tour_expect'];
            $data['noguest'] = $tourDetails[0]['noguest'];
            $data['nonights'] = $tourDetails[0]['nonights'];
            return $data;
        }
        return [];

    }
}


