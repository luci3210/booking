<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

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

        $details = [
            'title'=> 'Receipt',
            'body'=>'test sending'
        ];
        Mail::to('hanscarreon0898@gmail.com')->send( new TestMail($details) );

        return view('payment_traxion.payment_status_callback',compact(['statusRes']));

    }
}
