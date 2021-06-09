<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentService;


class TraxionApiController extends Controller
{
    //

    public function status_callback(Request $req){
        $paymentService = new PaymentService();
        $paymentService->updatePaymentStatus($req);
        return 'payment';
    }
}
