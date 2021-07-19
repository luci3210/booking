<?php

namespace App\Http\Controllers;

use App\Model\Admin\PayCredsModel;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
// use GuzzleHttp;
use App\user\StatusPaymentModel;
use App\user\PaymentModel;
use App\Services\PaymentService;
use App\Services\UserAuthService;


class PaymentController extends Controller
{

    public function getUser(Request $req)
    {

        return 'helloo';
    }
    public function __construct() {
        $this->middleware('auth:web');
	}

	public function creds() {
		return PayCredsModel::where('temp_status',1)->first();
	}

    function examplepay() {
        // $secret_key = "cxl+hwc%97h6+4#lx1au*ut=ml+=!fx85w94iuf*06=rf383xs";
        // $public_key = '7)5dmcfy^dp*9bdrcfcm$k-n=p7b!x(t)_f^i8mxl@v_+rno*x';

            $credentials = $this->creds();

            $secret_key = $credentials->private_key;
            //$secret_key = 'cxl+hwc%97h6+4#lx1au*ut=ml+=!fx85w94iuf*06=rf383xs';
            $public_key = $credentials->public_key;
            
            // Initialize variables for the payform data
            $payment_code = "ABC123DEF456";
            $payment_description = "My test payment";
            $total_amount = 1500;
            
            // When on callback the user wants to process multiple records with multiple ID's, encrypt an object using base64
            $sample_ref = array("payment_code"=>$payment_code);
            $data_ref =  iconv('UTF-8', 'ASCII', base64_encode(utf8_encode(json_encode($sample_ref))));

            // URLs for page redirections
            $site_url = "https://dev.traxionpay.com/";
            $api_url = "https://devapi.traxionpay.com/";
            
            $data_to_hash = $payment_code . $total_amount . 'PHP' . $payment_description;
            $secure_hash = hash_hmac('sha256', utf8_encode($data_to_hash), utf8_encode($secret_key));
            $auth_hash = hash_hmac('sha256', utf8_encode($public_key), utf8_encode($secret_key));
            
            $raw_payform = array(
                "merchant_id" =>  6328,
                "merchant_ref_no" => "ABC123DEF456",
                "merchant_additional_data" => "sample==",
                "amount" => 1500,
                "currency" => 'PHP',
                "description" => "My test payment",
                "billing_email" => "sample@email.com",
                "billing_first_name" => "John",
                "billing_last_name" => "Doe",
                "billing_middle_name" => "Peters",
                "billing_phone" => "NA",
                "billing_mobile" => "09123456789",
                "billing_address" => "Sampalok St. Emerald Village",
                "billing_address2" => "N/A",
                "billing_city" => "Quezon City",
                "billing_state" => "N/A",
                "billing_zip" => "11601",
                "billing_country" => "PH",
                "billing_remark" => "N/A",
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

            // Returns encrypted payform_data
            // Output: eyJtZXJjaGFudF9pZCI6NjMyOCwibWVyY2hhbnRfcmVmX25vIjoiQUJDMTIzREVGNDU2IiwibWVyY2hhbnRfYWRkaXRpb25hbF9kYXRhIjoiZXlKd1lYbHRaVzUwWDJOdlpHVWlPaUpCUWtNeE1qTkVSVVkwTlRZaWZRPT0iLCJhbW91bnQiOjE1MDAsImN1cnJlbmN5IjoiUEhQIiwiZGVzY3JpcHRpb24iOiJNeSB0ZXN0IHBheW1lbnQiLCJiaWxsaW5nX2VtYWlsIjoic2FtcGxlQGVtYWlsLmNvbSIsImJpbGxpbmdfZmlyc3RfbmFtZSI6IkpvaG4iLCJiaWxsaW5nX2xhc3RfbmFtZSI6IkRvZSIsImJpbGxpbmdfbWlkZGxlX25hbWUiOiJQZXRlcnMiLCJiaWxsaW5nX3Bob25lIjoiIiwiYmlsbGluZ19tb2JpbGUiOiIwOTEyMzQ1Njc4OSIsImJpbGxpbmdfYWRkcmVzcyI6IlNhbXBhbG9rIFN0LiBFbWVyYWxkIFZpbGxhZ2UiLCJiaWxsaW5nX2FkZHJlc3MyIjoiIiwiYmlsbGluZ19jaXR5IjoiUXVlem9uIENpdHkiLCJiaWxsaW5nX3N0YXRlIjoiTi9BIiwiYmlsbGluZ196aXAiOiIxMTYwMSIsImJpbGxpbmdfY291bnRyeSI6IlBIIiwiYmlsbGluZ19yZW1hcmsiOiIiLCJwYXltZW50X21ldGhvZCI6IiIsInN0YXR1c19ub3RpZmljYXRpb25fdXJsIjoiaHR0cHM6Ly9kZXZhcGkudHJheGlvbnBheS5jb20vY2FsbGJhY2siLCJzdWNjZXNzX3BhZ2VfdXJsIjoiaHR0cHM6Ly9kZXYudHJheGlvbnBheS5jb20vIiwiZmFpbHVyZV9wYWdlX3VybCI6Imh0dHBzOi8vZGV2LnRyYXhpb25wYXkuY29tLyIsImNhbmNlbF9wYWdlX3VybCI6Imh0dHBzOi8vZGV2LnRyYXhpb25wYXkuY29tLyIsInBlbmRpbmdfcGFnZV91cmwiOiJodHRwczovL2Rldi50cmF4aW9ucGF5LmNvbS8iLCJzZWN1cmVfaGFzaCI6IjlhMjk5ZGIyMmEyZDdhYzU3Yjk5MTliNGFjYWZhOTU4Zjc2MTYxYjhlMjQ4OGFkMjIyZWQ1N2JiMTkxMTRhN2UiLCJhdXRoX2hhc2giOiJhNmUyZTY3OGQzNDliMWU4Y2MyNzlhMmJmNDU1N2FjZjcxMTU3MmQ2ZDUwZGFiYjIzYTIxZDQxNWU3OWVkMTY5IiwiYWxnIjoiSFMyNTYifQ==

            //https://app.traxionpay.com/payme/?data=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJtZXJjaGFudCI6ODUyOSwibWVyY2hhbnRfbmFtZSI6IlRvdXJpc21vUEggQ29ycG9yYXRpb24iLCJtZXJjaGFudF9mZWUiOjAuMCwibWVyY2hhbnRfbGV2ZWwiOjIsImFwcGx5X2ZlZXMiOnRydWUsImNhc2hfaW5fbGltaXQiOi0xLjAsInBheW1lX251bWJlciI6ODY2NDIyLCJtZXJjaGFudF9zaG91bGRlcmVkIjp0cnVlLCJhbW91bnQiOjUwOTIuMCwiZGVzY3JpcHRpb24iOiJDb3JyZWRvciBJcy4sIFRoZSBSb2NrIGJvb2tpbmciLCJtZXJjaGFudF9yZWZfbm8iOiI1YThjMTJlYjE5MDE2IiwibWVyY2hhbnRfYWRkaXRpb25hbF9kYXRhIjoiQWRkaXRpb25hbCBEYXRhIiwicHVycG9zZSI6IiIsInNvdXJjZSI6IiIsInNwZWNpZnkiOiIiLCJjY19tZHIiOjAsImNjX2ZlZSI6MCwiYWdncmVnYXRvcl9mZWUiOjB9.MHHqWbf74rokfxqdHJ1HXwB8NEGo24uQBjhdMtuRvGc&form_data=eyJtZXJjaGFudF9pZCI6Ijg1MjkiLCJtZXJjaGFudF9yZWZfbm8iOiI1YThjMTJlYjE5MDE2IiwibWVyY2hhbnRfYWRkaXRpb25hbF9kYXRhIjoiQWRkaXRpb25hbCBEYXRhIiwiYW1vdW50IjoiNTA5Mi4wMCIsImN1cnJlbmN5IjoiUEhQIiwiZGVzY3JpcHRpb24iOiJDb3JyZWRvciBJcy4sIFRoZSBSb2NrIGJvb2tpbmciLCJiaWxsaW5nX2VtYWlsIjoiamF5c29uLmNsYXJvc0BnbWFpbC5jb20iLCJiaWxsaW5nX2ZpcnN0X25hbWUiOiJkZmRmIiwiYmlsbGluZ19sYXN0X25hbWUiOiJzZHNkcyIsImJpbGxpbmdfbWlkZGxlX25hbWUiOiJOb25lIiwiYmlsbGluZ19waG9uZSI6IjA5NDY2ODI5NDIyIiwiYmlsbGluZ19tb2JpbGUiOiIwOTQ2NjgyOTQyMiIsImJpbGxpbmdfYWRkcmVzcyI6IjE0MjUgZmRnZmcuZSBoc2pzaiBramFramFzIiwiYmlsbGluZ19hZGRyZXNzMiI6Ik5vbmUiLCJiaWxsaW5nX2NpdHkiOiJtYW5pbGFgIiwiYmlsbGluZ19zdGF0ZSI6Ik5vbmUiLCJiaWxsaW5nX3ppcCI6Ik5vbmUiLCJiaWxsaW5nX2NvdW50cnkiOiJOb25lIiwiYmlsbGluZ19yZW1hcmsiOiJOb25lIiwicGF5bWVudF9tZXRob2QiOiJCT0ciLCJzdGF0dXNfbm90aWZpY2F0aW9uX3VybCI6Imh0dHBzOi8vNjM0MmEzMzQubmdyb2suaW8vY2FsbGJhY2siLCJzdWNjZXNzX3BhZ2VfdXJsIjoiaHR0cHM6Ly9ib29raW5nLmV0b3VyaXNtby5jb20vbGlzdGluZy1jaGVja291dC8/cGF5bWVudD1zdWNjZXNzJiIsImZhaWx1cmVfcGFnZV91cmwiOiJodHRwczovL2Jvb2tpbmcuZXRvdXJpc21vLmNvbS9wYXltZW50LWZhaWxlZC8iLCJjYW5jZWxfcGFnZV91cmwiOiJodHRwczovL2Jvb2tpbmcuZXRvdXJpc21vLmNvbS9saXN0aW5nLWNoZWNrb3V0Lz9wYXltZW50PWNhbmNlbCYiLCJwZW5kaW5nX3BhZ2VfdXJsIjoiaHR0cHM6Ly9ib29raW5nLmV0b3VyaXNtby5jb20vbGlzdGluZy1jaGVja291dC8/cGF5bWVudD1wZW5kaW5nJiIsInNlY3VyZV9oYXNoIjoiNmUyOTA4ZjdmZDUwYWIwZDg3ZjllY2QxMTNiN2ViYzg4MGYxNzNhNTNhMjM3YzJlNDU2NWVjNjcyNjkxZDlhZCIsImF1dGhfaGFzaCI6IjYwY2Q2MjkyZmY0MDIzZWRmNmZlMjE0YWU0MjUyN2JhMzUzZjViODM5OTEzZDc1NWMyMTllZmJkNDc1MmUyMWEiLCJhbGciOiJIUzI1NiJ9

            //https://app.traxionpay.com/payme/?data=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJtZXJjaGFudCI6ODUyOSwibWVyY2hhbnRfbmFtZSI6IlRvdXJpc21vUEggQ29ycG9yYXRpb24iLCJtZXJjaGFudF9mZWUiOjAuMCwibWVyY2hhbnRfbGV2ZWwiOjIsImFwcGx5X2ZlZXMiOnRydWUsImNhc2hfaW5fbGltaXQiOi0xLjAsInBheW1lX251bWJlciI6MzM0MzA3LCJtZXJjaGFudF9zaG91bGRlcmVkIjp0cnVlLCJhbW91bnQiOjEwMC4wLCJkZXNjcmlwdGlvbiI6IkJTQSBUd2luIFRvd2VycyIsIm1lcmNoYW50X3JlZl9ubyI6IjVhOGMxMmViMTkwMTYiLCJtZXJjaGFudF9hZGRpdGlvbmFsX2RhdGEiOiJBZGRpdGlvbmFsIERhdGEiLCJwdXJwb3NlIjoiIiwic291cmNlIjoiIiwic3BlY2lmeSI6IiIsImNjX21kciI6MCwiY2NfZmVlIjowLCJhZ2dyZWdhdG9yX2ZlZSI6MH0.gv2KqeVjq9_BF7xhB9yaquwr6_zcNjEQqSM7qixJE1o&form_data=eyJtZXJjaGFudF9pZCI6Ijg1MjkiLCJtZXJjaGFudF9yZWZfbm8iOiI1YThjMTJlYjE5MDE2IiwibWVyY2hhbnRfYWRkaXRpb25hbF9kYXRhIjoiQWRkaXRpb25hbCBEYXRhIiwiYW1vdW50IjoxMDAsImN1cnJlbmN5IjoiUEhQIiwiZGVzY3JpcHRpb24iOiJCU0EgVHdpbiBUb3dlcnMiLCJiaWxsaW5nX2VtYWlsIjoiamF5c29uLmNsYXJvc0BnbWFpbC5jb20iLCJiaWxsaW5nX2ZpcnN0X25hbWUiOiJqYXlzb25hIiwiYmlsbGluZ19sYXN0X25hbWUiOm51bGwsImJpbGxpbmdfbWlkZGxlX25hbWUiOiJOb25lIiwiYmlsbGluZ19waG9uZSI6IjA5NDY2ODI5NDUzIiwiYmlsbGluZ19tb2JpbGUiOiIwOTQ2NjgyOTQ1MyIsImJpbGxpbmdfYWRkcmVzcyI6bnVsbCwiYmlsbGluZ19hZGRyZXNzMiI6Ik5vbmUiLCJiaWxsaW5nX2NpdHkiOm51bGwsImJpbGxpbmdfc3RhdGUiOiJOb25lIiwiYmlsbGluZ196aXAiOiJOb25lIiwiYmlsbGluZ19jb3VudHJ5IjoiTm9uZSIsImJpbGxpbmdfcmVtYXJrIjoiTm9uZSIsInBheW1lbnRfbWV0aG9kIjoiQk9HIiwic3RhdHVzX25vdGlmaWNhdGlvbl91cmwiOiJodHRwczovLzYzNDJhMzM0Lm5ncm9rLmlvL2NhbGxiYWNrIiwic3VjY2Vzc19wYWdlX3VybCI6Imh0dHBzOi8vYm9va2luZy5ldG91cmlzbW8uY29tL2xpc3RpbmctY2hlY2tvdXQvP3BheW1lbnQ9c3VjY2VzcyYiLCJmYWlsdXJlX3BhZ2VfdXJsIjoiaHR0cHM6Ly9ib29raW5nLmV0b3VyaXNtby5jb20vcGF5bWVudC1mYWlsZWQvIiwiY2FuY2VsX3BhZ2VfdXJsIjoiaHR0cHM6Ly9ib29raW5nLmV0b3VyaXNtby5jb20vbGlzdGluZy1jaGVja291dC8/cGF5bWVudD1jYW5jZWwmIiwicGVuZGluZ19wYWdlX3VybCI6Imh0dHBzOi8vYm9va2luZy5ldG91cmlzbW8uY29tL2xpc3RpbmctY2hlY2tvdXQvP3BheW1lbnQ9cGVuZGluZyYiLCJzZWN1cmVfaGFzaCI6IjYzNWE0ZjhkYzRhMzI3Y2E3MDEzOTY1ZDkyZWMwOGZmNmVmNGJiMDYzOTJiYTE5YjRiODBlOTk1ZmQ3OWI5ZjAiLCJhdXRoX2hhc2giOiIxYjI4NWU1NDhhNzUzMTViNTg1NmU0ZjRjNWJjZmQ2YzZhNzM2ZDc5ZjEzNTZmNDlmY2JiY2I4ZmU0ZGJlOGQ5IiwiYWxnIjoiSFMyNTYifQ==





    }

    function generateToken()
    {
        $secret_key = '0nwi%7buga7g57bant=*y54rl7)u_$hw!*wmtzjypyu=#ta8%r';

        // encode secret key using base64
        $token = base64_encode(utf8_encode($secret_key));

        // Token: Y3hsK2h3YyU5N2g2KzQjbHgxYXUqdXQ9bWwrPSFmeDg1dzk0aXVmKjA2PXJmMzgzeHM=
        return $token;
    }

	function pay_booking(Request $req) {
        try {
            // $data['errors'] = null;
            // $data['success'] = null;
            // $data['info'] = null;
            
            $paymentInfo = $req->post();
            $data['post'] =  $paymentInfo;
            $credentials = $this->creds();

            $secret_key = $credentials->private_key;
            $public_key = $credentials->public_key;

            // $secret_key = $this->generateToken();
            // $public_key = '@ik2-#n)3yyxqa_g5t-sy)qbsl0)eu(_6-weu=v^aa)%$x!ll5';
            $merchant_id = "8529";
            
        
            $dataToHash = "5a8c12eb19016500.00PHPMy Product";
            $secure_hash = hash_hmac('sha256', $dataToHash, $secret_key, false);
            $auth_hash = hash_hmac('sha256', $public_key, $secret_key, false);
            $paymentService = new PaymentService();
            $extraData = $paymentService->SavePayment($req->uid,'pending',$req->book_date, $req->book_date_to, $req->billing_price, $req->children_count);
            // $bookDetails['name'] = $req->billing_plan_name;
            // $bookDetails['desc'] = $req->desc;
            // $bookDetails['expect'] = $req->expect;
            // $bookDetails['noguest'] = $req->noguest;
            // $bookDetailsss = array(
            //     'name'=> $req->billing_plan_name,
            //     'desc'=>$req->desc,
            //     'expect'=>$req->expect,
            //     'noguest'=>$req->noguest,
            // );
            $bookDetailsss['uid'] = $req->uid;
            $bookDetailsss = base64_encode(json_encode($bookDetailsss));
            $data['bookdetails'] = $bookDetailsss;
            $data['extraData'] = $extraData;
            // return $extraData;

            
            $customer_array = array (
                'merchant_id' => $merchant_id,
                'merchant_ref_no' => '5a8c12eb19016',
                'merchant_additional_data' => 'Additional Data',
                'amount' => $req->billing_price,
                'currency' => 'PHP',
                'description' => $req->billing_plan_name,
                'billing_email' => $req->billing_email,
                'billing_first_name' => $req->billing_first_name,
                'billing_last_name' => $req->billing_last_name,
                'billing_middle_name' => "N/A",
                'billing_phone' => $req->billing_phone,
                'billing_mobile' => $req->billing_phone,
                'billing_address' => $req->billing_address_1,
                'billing_address2' => "None",
                "billing_address2" => "N/A",
                "billing_city" => "N/A",
                "billing_state" => "N/A",
                "billing_zip" => "N/A",
                "billing_country" => $req->billing_country,
                "billing_remark" => "N/A",
                "payment_method" => "",
                // 'status_notification_url' => 'https://6342a334.ngrok.io/callback',
                    
                // 'status_notification_url' => 'https://booking.tourismo.ph/api/payment/status/callback?extra='.$extraData,
                // 'status_notification_url' => 'https://5cd521835102.ngrok.io/booking/public/api/payment/status/callback?extra='.$extraData.'&details='.$req->proid,
                'status_notification_url' => 'https://87339769cc6b.ngrok.io/booking/public/api/payment/status/callback?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData,
                'success_page_url' => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&payment=success&',
                'failure_page_url' => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&payment=failed&',
                'cancel_page_url' => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&payment=cancel&',
                'pending_page_url' => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&payment=pending&',

                // 'success_page_url' => 'https://booking.etourismo.com/listing-checkout/?payment=success&',
                // 'failure_page_url' => 'https://booking.etourismo.com/payment-failed/',
                // 'cancel_page_url' => 'https://booking.etourismo.com/listing-checkout/?payment=cancel&',
                // 'pending_page_url' => 'https://booking.etourismo.com/listing-checkout/?payment=pending&',
                'secure_hash' => $secure_hash,
                'auth_hash' => $auth_hash,
                'alg' => 'HS256',
            );
            // $payform_data = json_encode($raw_payform, JSON_UNESCAPED_SLASHES);
            // $decoded = utf8_decode(base64_encode(utf8_encode($payform_data)));

            $billing_json = json_encode($customer_array, JSON_UNESCAPED_SLASHES);
            // $data['form_data'] = base64_encode($billing_json);
            $paymentInfo['form_data'] = utf8_decode(base64_encode(utf8_encode($billing_json)));
            $data['decodedform'] = $paymentInfo;
            // $paymentInfo['form_data'] = base64_encode($billing_json);

            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.traxionpay.com/payform-link?format=json",
                // CURLOPT_URL => "https://devapi.traxionpay.com/payform",
            CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $paymentInfo,
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                ),
            ));


            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);
            sleep(2);
            $dataresp = '';
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $dataresp = json_decode($response);
            }
            $data['dataresp'] = $dataresp;
            return $data;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return 'no';
    }

    


}
