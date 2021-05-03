<?php

namespace App\Http\Controllers;

use App\Model\Admin\PayCredsModel;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct() {

	 	$this->middleware('auth:web');
	}

	public function creds() {

		return PayCredsModel::where('temp_status',1)->first();
	}

	public function pay_booking() {

		

	}   

	public function gentoken(Request $request)
        {
            $credentials = $this->creds();

            $secret_key = $credentials->private_key;
            $public_key = $credentials->public_key;
            
            $payment_code = $credentials->merchant_id;
            $payment_description = $credentials->merchant_name;
            
            $total_amount = 1500;
            
            //callback

            $sample_ref = array("payment_code"=>$payment_code);
            $data_ref =  iconv('UTF-8', 'ASCII', base64_encode(utf8_encode(json_encode($sample_ref))));

            // URLs for page redirections

            $site_url = "https://dev.traxionpay.com/";
            $api_url = "https://devapi.traxionpay.com/";
            
            $data_to_hash = $payment_code . $total_amount . 'PHP' . $payment_description;
            $secure_hash = hash_hmac('sha256', utf8_encode($data_to_hash), utf8_encode($secret_key));
            $auth_hash = hash_hmac('sha256', utf8_encode($public_key), utf8_encode($secret_key));
            
            $raw_payform = array(
                "merchant_id" =>  $credentials->merchant_id,
                "merchant_ref_no" => $payment_code,
                "merchant_additional_data" => "eyJwYXltZW50X2NvZGUiOiJBQkMxMjNERUY0NTYifQ==",
                "amount" => 1500,
                "currency" => 'PHP',
                "description" => "My test payment",
                "billing_email" => $request->email,
                "billing_first_name" => $request->fname,
                "billing_last_name" => $request->lname,
                "billing_middle_name" => $request->mname,
                "billing_phone" => "",
                "billing_mobile" => $request->pnumber,
                "billing_address" => $request->address,
                "billing_address2" => "",
                "billing_city" => $request->country,
                "billing_state" => "N/A",
                "billing_zip" => "N/A",
                "billing_country" => $request->country,
                "billing_remark" => "",
                "payment_method" => "",
                "status_notification_url" => $api_url . 'callback',
                "success_page_url" => "https://devapi.traxionpay.com/callback",
                "failure_page_url" => "https://dev.traxionpay.com/",
                "cancel_page_url" => "https://dev.traxionpay.com/",
                "pending_page_url" => "https://dev.traxionpay.com/",
                "secure_hash" => "9a299db22a2d7ac57b9919b4acafa958f76161b8e2488ad222ed57bb19114a7e",
                "auth_hash" => "a6e2e678d349b1e8cc279a2bf4557acf711572d6d50dabb23a21d415e79ed169",
                "alg" => "HS256",
            );
            
            $payform_data = json_encode($raw_payform, JSON_UNESCAPED_SLASHES);
            $decoded = utf8_decode(base64_encode(utf8_encode($payform_data)));

            return $decoded;
        }


}
