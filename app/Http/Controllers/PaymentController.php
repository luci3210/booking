<?php

namespace App\Http\Controllers;

use App\Model\Admin\PayCredsModel;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct() {

	 	$this->middleware('auth:web');
	}

	public function creds() {

		return PayCredsModel::where('temp_status',1)->first();
	}

	public function pay_booking(Request $request) {

        $credentials = $this->creds();

        $secret_key = $credentials->private_key;
        $public_key = $credentials->public_key;
        $merchant_id = "8529";

        $dataToHash = "5a8c12eb19016500.00PHPMy Product";
        $secure_hash = hash_hmac('sha256', $dataToHash, $secret_key, false);
        $auth_hash = hash_hmac('sha256', $public_key, $secret_key, false);


        $customer_array = array (
        'merchant_id' => $merchant_id,
        'merchant_ref_no' => '5a8c12eb19016',
        'merchant_additional_data' => 'Additional Data',
        'amount' => 1500,
        'currency' => 'PHP',
        'description' => "aa",
        'billing_email' => $request->email,
        'billing_first_name' => $request->fname,
        'billing_last_name' => $request->fname,
        'billing_middle_name' => $request->mname,
        'billing_phone' => $$request->pnumber,
        'billing_mobile' => $request->pnumber,
        'billing_address' => $request->address,
        'billing_address2' => "None",
        'billing_city' => "None",
        'billing_state' => "None",
        'billing_zip' => "None",
        'billing_country' => "None",
        'billing_remark' => "None",
        'payment_method' => 'BOG',
        'status_notification_url' => 'https://6342a334.ngrok.io/callback',
        'success_page_url' => 'https://booking.etourismo.com/listing-checkout/?payment=success&',
        'failure_page_url' => 'https://booking.etourismo.com/payment-failed/',
        'cancel_page_url' => 'https://booking.etourismo.com/listing-checkout/?payment=cancel&',
        'pending_page_url' => 'https://booking.etourismo.com/listing-checkout/?payment=pending&',
        'secure_hash' => $secure_hash,
        'auth_hash' => $auth_hash,
        'alg' => 'HS256',
    );


	}   


}
