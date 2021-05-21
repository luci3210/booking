<?php

namespace App\Http\Controllers;

use App\Model\Admin\PayCredsModel;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp;


class PaymentController extends Controller
{
    public function __construct() {

	 	$this->middleware('auth:web');
	}

	public function creds() {

		return PayCredsModel::where('temp_status',1)->first();
	}

    public function sssss() {

    $data = array("NAME" => "somename","AGE" => "22");

    $url = 'https://api.traxionpay.com/payform-link?format=json';
    $ch = curl_init();

    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);

    dd($result);

        curl_close($ch);

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
                "billing_phone" => "",
                "billing_mobile" => "09123456789",
                "billing_address" => "Sampalok St. Emerald Village",
                "billing_address2" => "",
                "billing_city" => "Quezon City",
                "billing_state" => "N/A",
                "billing_zip" => "11601",
                "billing_country" => "PH",
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

            // Returns encrypted payform_data
            // Output: eyJtZXJjaGFudF9pZCI6NjMyOCwibWVyY2hhbnRfcmVmX25vIjoiQUJDMTIzREVGNDU2IiwibWVyY2hhbnRfYWRkaXRpb25hbF9kYXRhIjoiZXlKd1lYbHRaVzUwWDJOdlpHVWlPaUpCUWtNeE1qTkVSVVkwTlRZaWZRPT0iLCJhbW91bnQiOjE1MDAsImN1cnJlbmN5IjoiUEhQIiwiZGVzY3JpcHRpb24iOiJNeSB0ZXN0IHBheW1lbnQiLCJiaWxsaW5nX2VtYWlsIjoic2FtcGxlQGVtYWlsLmNvbSIsImJpbGxpbmdfZmlyc3RfbmFtZSI6IkpvaG4iLCJiaWxsaW5nX2xhc3RfbmFtZSI6IkRvZSIsImJpbGxpbmdfbWlkZGxlX25hbWUiOiJQZXRlcnMiLCJiaWxsaW5nX3Bob25lIjoiIiwiYmlsbGluZ19tb2JpbGUiOiIwOTEyMzQ1Njc4OSIsImJpbGxpbmdfYWRkcmVzcyI6IlNhbXBhbG9rIFN0LiBFbWVyYWxkIFZpbGxhZ2UiLCJiaWxsaW5nX2FkZHJlc3MyIjoiIiwiYmlsbGluZ19jaXR5IjoiUXVlem9uIENpdHkiLCJiaWxsaW5nX3N0YXRlIjoiTi9BIiwiYmlsbGluZ196aXAiOiIxMTYwMSIsImJpbGxpbmdfY291bnRyeSI6IlBIIiwiYmlsbGluZ19yZW1hcmsiOiIiLCJwYXltZW50X21ldGhvZCI6IiIsInN0YXR1c19ub3RpZmljYXRpb25fdXJsIjoiaHR0cHM6Ly9kZXZhcGkudHJheGlvbnBheS5jb20vY2FsbGJhY2siLCJzdWNjZXNzX3BhZ2VfdXJsIjoiaHR0cHM6Ly9kZXYudHJheGlvbnBheS5jb20vIiwiZmFpbHVyZV9wYWdlX3VybCI6Imh0dHBzOi8vZGV2LnRyYXhpb25wYXkuY29tLyIsImNhbmNlbF9wYWdlX3VybCI6Imh0dHBzOi8vZGV2LnRyYXhpb25wYXkuY29tLyIsInBlbmRpbmdfcGFnZV91cmwiOiJodHRwczovL2Rldi50cmF4aW9ucGF5LmNvbS8iLCJzZWN1cmVfaGFzaCI6IjlhMjk5ZGIyMmEyZDdhYzU3Yjk5MTliNGFjYWZhOTU4Zjc2MTYxYjhlMjQ4OGFkMjIyZWQ1N2JiMTkxMTRhN2UiLCJhdXRoX2hhc2giOiJhNmUyZTY3OGQzNDliMWU4Y2MyNzlhMmJmNDU1N2FjZjcxMTU3MmQ2ZDUwZGFiYjIzYTIxZDQxNWU3OWVkMTY5IiwiYWxnIjoiSFMyNTYifQ==




            //https://app.traxionpay.com/payme/?data=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJtZXJjaGFudCI6ODUyOSwibWVyY2hhbnRfbmFtZSI6IlRvdXJpc21vUEggQ29ycG9yYXRpb24iLCJtZXJjaGFudF9mZWUiOjAuMCwibWVyY2hhbnRfbGV2ZWwiOjIsImFwcGx5X2ZlZXMiOnRydWUsImNhc2hfaW5fbGltaXQiOi0xLjAsInBheW1lX251bWJlciI6ODY2NDIyLCJtZXJjaGFudF9zaG91bGRlcmVkIjp0cnVlLCJhbW91bnQiOjUwOTIuMCwiZGVzY3JpcHRpb24iOiJDb3JyZWRvciBJcy4sIFRoZSBSb2NrIGJvb2tpbmciLCJtZXJjaGFudF9yZWZfbm8iOiI1YThjMTJlYjE5MDE2IiwibWVyY2hhbnRfYWRkaXRpb25hbF9kYXRhIjoiQWRkaXRpb25hbCBEYXRhIiwicHVycG9zZSI6IiIsInNvdXJjZSI6IiIsInNwZWNpZnkiOiIiLCJjY19tZHIiOjAsImNjX2ZlZSI6MCwiYWdncmVnYXRvcl9mZWUiOjB9.MHHqWbf74rokfxqdHJ1HXwB8NEGo24uQBjhdMtuRvGc&form_data=eyJtZXJjaGFudF9pZCI6Ijg1MjkiLCJtZXJjaGFudF9yZWZfbm8iOiI1YThjMTJlYjE5MDE2IiwibWVyY2hhbnRfYWRkaXRpb25hbF9kYXRhIjoiQWRkaXRpb25hbCBEYXRhIiwiYW1vdW50IjoiNTA5Mi4wMCIsImN1cnJlbmN5IjoiUEhQIiwiZGVzY3JpcHRpb24iOiJDb3JyZWRvciBJcy4sIFRoZSBSb2NrIGJvb2tpbmciLCJiaWxsaW5nX2VtYWlsIjoiamF5c29uLmNsYXJvc0BnbWFpbC5jb20iLCJiaWxsaW5nX2ZpcnN0X25hbWUiOiJkZmRmIiwiYmlsbGluZ19sYXN0X25hbWUiOiJzZHNkcyIsImJpbGxpbmdfbWlkZGxlX25hbWUiOiJOb25lIiwiYmlsbGluZ19waG9uZSI6IjA5NDY2ODI5NDIyIiwiYmlsbGluZ19tb2JpbGUiOiIwOTQ2NjgyOTQyMiIsImJpbGxpbmdfYWRkcmVzcyI6IjE0MjUgZmRnZmcuZSBoc2pzaiBramFramFzIiwiYmlsbGluZ19hZGRyZXNzMiI6Ik5vbmUiLCJiaWxsaW5nX2NpdHkiOiJtYW5pbGFgIiwiYmlsbGluZ19zdGF0ZSI6Ik5vbmUiLCJiaWxsaW5nX3ppcCI6Ik5vbmUiLCJiaWxsaW5nX2NvdW50cnkiOiJOb25lIiwiYmlsbGluZ19yZW1hcmsiOiJOb25lIiwicGF5bWVudF9tZXRob2QiOiJCT0ciLCJzdGF0dXNfbm90aWZpY2F0aW9uX3VybCI6Imh0dHBzOi8vNjM0MmEzMzQubmdyb2suaW8vY2FsbGJhY2siLCJzdWNjZXNzX3BhZ2VfdXJsIjoiaHR0cHM6Ly9ib29raW5nLmV0b3VyaXNtby5jb20vbGlzdGluZy1jaGVja291dC8/cGF5bWVudD1zdWNjZXNzJiIsImZhaWx1cmVfcGFnZV91cmwiOiJodHRwczovL2Jvb2tpbmcuZXRvdXJpc21vLmNvbS9wYXltZW50LWZhaWxlZC8iLCJjYW5jZWxfcGFnZV91cmwiOiJodHRwczovL2Jvb2tpbmcuZXRvdXJpc21vLmNvbS9saXN0aW5nLWNoZWNrb3V0Lz9wYXltZW50PWNhbmNlbCYiLCJwZW5kaW5nX3BhZ2VfdXJsIjoiaHR0cHM6Ly9ib29raW5nLmV0b3VyaXNtby5jb20vbGlzdGluZy1jaGVja291dC8/cGF5bWVudD1wZW5kaW5nJiIsInNlY3VyZV9oYXNoIjoiNmUyOTA4ZjdmZDUwYWIwZDg3ZjllY2QxMTNiN2ViYzg4MGYxNzNhNTNhMjM3YzJlNDU2NWVjNjcyNjkxZDlhZCIsImF1dGhfaGFzaCI6IjYwY2Q2MjkyZmY0MDIzZWRmNmZlMjE0YWU0MjUyN2JhMzUzZjViODM5OTEzZDc1NWMyMTllZmJkNDc1MmUyMWEiLCJhbGciOiJIUzI1NiJ9






            // $datas = json_decode($de)

            return $decoded;
    }

	public function pay_booking(Request $request) {

// $payment_code = "ABC123DEF456";
// $payment_description = "My test payment";
// $total_amount = 1500;

// // When on callback the user wants to process multiple records with multiple ID's, encrypt an object using base64
// $sample_ref = array("payment_code"=>$payment_code);
// $data_ref =  iconv('UTF-8', 'ASCII', base64_encode(utf8_encode(json_encode($sample_ref))));

// // URLs for page redirections
// $site_url = "https://dev.traxionpay.com/";
// $api_url = "https://devapi.traxionpay.com/";

// $data_to_hash = $payment_code . $total_amount . 'PHP' . $payment_description;
// $secure_hash = hash_hmac('sha256', utf8_encode($data_to_hash), utf8_encode($secret_key));
// $auth_hash = hash_hmac('sha256', utf8_encode($public_key), utf8_encode($secret_key));

        // $data = $request->query('fname','lname');
        $data = array("NAME" => "somename","AGE" => "22");

        $credentials = $this->creds();

        $secret_key = $credentials->private_key;
        $public_key = $credentials->public_key;

        $merchant_id = "8529";

        $dataToHash = "5a8c12eb19016500.00PHPMy Product";

        $secure_hash = hash_hmac('sha256', $dataToHash, $secret_key, false);
        $auth_hash = hash_hmac('sha256', $public_key, $secret_key, false);
        
        // $secure_hash = hash_hmac('sha256', $dataToHash, $secret_key, false);
        // $auth_hash = hash_hmac('sha256', $public_key, $secret_key, false);

        $customer_array = array (
        'merchant_id' => 8529,
        'merchant_ref_no' => "5a8c12eb19016",
        'merchant_additional_data' => "Additional Data",
        'amount' => 1500,
        'currency' => 'PHP',
        'description' => "Description",
        'billing_email' => "email@gmail.com",
        'billing_first_name' => "jayson",
        'billing_last_name' => "claros",
        'billing_middle_name' => "curada",
        'billing_phone' => "123456789",
        'billing_mobile' => "12345678",
        'billing_address' => "address1",
        'billing_address2' => "address2",
        'billing_city' => "None",
        'billing_state' => "None",
        'billing_zip' => "None",
        'billing_country' => "None",
        'billing_remark' => "None",
        'payment_method' => 'BOG',
        'status_notification_url' => 'https://6342a334.ngrok.io/callback',
          "success_page_url" => "https://devapi.traxionpay.com/callback",
                "failure_page_url" => "https://dev.traxionpay.com/",
                "cancel_page_url" => "https://dev.traxionpay.com/",
                "pending_page_url" => "https://dev.traxionpay.com/",
        'secure_hash' => $secure_hash,
        'auth_hash' => $auth_hash,
        'alg' => 'HS256',
    );

        // $payform_data = json_encode($raw_payform, JSON_UNESCAPED_SLASHES);
        // $decoded = utf8_decode(base64_encode(utf8_encode($payform_data)));

        $billing_json = json_encode($customer_array, JSON_UNESCAPED_SLASHES);
        $data['form_data'] = base64_encode($billing_json);

        // $client = GuzzleHttp\Client();
        // $res = $client->request('GET','https://api.traxionpay.com/payform-link?format=json', [
        //     'header'=> [
        //         'Accept'=>'application/json',
        //         'Content-Type'=>'application/json',
        //         'Authorization'=>'eyJtZXJjaGFudF9pZCI6NjMyOCwibWVyY2hhbnRfcmVmX25vIjoiQUJDMTIzREVGNDU2IiwibWVyY2hhbnRfYWRkaXRpb25hbF9kYXRhIjoiZXlKd1lYbHRaVzUwWDJOdlpHVWlPaUpCUWtNeE1qTkVSVVkwTlRZaWZRPT0iLCJhbW91bnQiOjE1MDAsImN1cnJlbmN5IjoiUEhQIiwiZGVzY3JpcHRpb24iOiJNeSB0ZXN0IHBheW1lbnQiLCJiaWxsaW5nX2VtYWlsIjoic2FtcGxlQGVtYWlsLmNvbSIsImJpbGxpbmdfZmlyc3RfbmFtZSI6IkpvaG4iLCJiaWxsaW5nX2xhc3RfbmFtZSI6IkRvZSIsImJpbGxpbmdfbWlkZGxlX25hbWUiOiJQZXRlcnMiLCJiaWxsaW5nX3Bob25lIjoiIiwiYmlsbGluZ19tb2JpbGUiOiIwOTEyMzQ1Njc4OSIsImJpbGxpbmdfYWRkcmVzcyI6IlNhbXBhbG9rIFN0LiBFbWVyYWxkIFZpbGxhZ2UiLCJiaWxsaW5nX2FkZHJlc3MyIjoiIiwiYmlsbGluZ19jaXR5IjoiUXVlem9uIENpdHkiLCJiaWxsaW5nX3N0YXRlIjoiTi9BIiwiYmlsbGluZ196aXAiOiIxMTYwMSIsImJpbGxpbmdfY291bnRyeSI6IlBIIiwiYmlsbGluZ19yZW1hcmsiOiIiLCJwYXltZW50X21ldGhvZCI6IiIsInN0YXR1c19ub3RpZmljYXRpb25fdXJsIjoiaHR0cHM6Ly9kZXZhcGkudHJheGlvbnBheS5jb20vY2FsbGJhY2siLCJzdWNjZXNzX3BhZ2VfdXJsIjoiaHR0cHM6Ly9kZXYudHJheGlvbnBheS5jb20vIiwiZmFpbHVyZV9wYWdlX3VybCI6Imh0dHBzOi8vZGV2LnRyYXhpb25wYXkuY29tLyIsImNhbmNlbF9wYWdlX3VybCI6Imh0dHBzOi8vZGV2LnRyYXhpb25wYXkuY29tLyIsInBlbmRpbmdfcGFnZV91cmwiOiJodHRwczovL2Rldi50cmF4aW9ucGF5LmNvbS8iLCJzZWN1cmVfaGFzaCI6IjlhMjk5ZGIyMmEyZDdhYzU3Yjk5MTliNGFjYWZhOTU4Zjc2MTYxYjhlMjQ4OGFkMjIyZWQ1N2JiMTkxMTRhN2UiLCJhdXRoX2hhc2giOiJhNmUyZTY3OGQzNDliMWU4Y2MyNzlhMmJmNDU1N2FjZjcxMTU3MmQ2ZDUwZGFiYjIzYTIxZDQxNWU3OWVkMTY5IiwiYWxnIjoiSFMyNTYifQ=='
        //     ]
        // ]);

        // $prod = json_decode((string) $res->getBody(), true);
        // return view('welcome')->with('prod', $prod);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.traxionpay.com/payform-link?format=json",
        //CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true, 
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $datas,
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

$ddd;

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $ddd =  json_decode($response);
}

return $ddd;

	}   


}
