<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use PDF;
class TraxionApiController extends Controller
{
    //

    public function status_callback(Request $req){
        $extra = $req->query('extra');
        $extra = base64_decode($extra);
        $extra = (array)json_decode($extra);
        $paymentService = new PaymentService();
        $paymentService->updatePaymentStatus($req,$extra);
        return 'payment';
    }

    public function payment_status(Request $req)
    {
        $statusRes = $req->query('payment');
        $extra = $req->query('extra');
        $extra = base64_decode($extra);
        $extra = (array)json_decode($extra);

        // $details = [
        //     'title'=> 'Receipt',
        //     'body'=>'helloo thank you'
        // ];

        // Mail::to($extra['user_email'])->send( new TestMail($details) );

        return view('payment_traxion.payment_status_callback',compact(['statusRes']));

    }

    public function invoice_copy(Request $req)
    {
        $extra = $req->query('extra');
        $extra = base64_decode($extra);
        $extra = (array)json_decode($extra);

        $stausPayment = $req->query('status');
        $stausPayment = base64_decode($stausPayment);
        $stausPayment = (array)json_decode($stausPayment);
        $pdf = PDF::loadView('invoice.payment_invoice',compact(['extra', 'stausPayment']));
        return $pdf->download('invoice.pdf');
        
    }
}


