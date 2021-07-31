<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\PayCredsModel;
use App\Services\PaymentService;

class TraxionController extends Controller
{
    //

    public function generate_link(Request $req)
    {
        try{

            $credentials    = $this->get_creds();
            // traxion creds

            $secure_hash = hash_hmac('sha256', $credentials['dataToHash'], $credentials['secret_key'], false);
            $auth_hash = hash_hmac('sha256', $credentials['public_key'], $credentials['secret_key'], false);
            // hash

            $paymentService = new PaymentService();
            // $extraData = $paymentService->SavePayment($req->uid,'pending',$req->book_date, $req->book_date_to, $req->billing_price, $req->children_count, $req->adult_count,$req->book_qty);
            $bookDetailsss['uid'] = $req->uid;
            $extraData ='21321';
            $bookDetailsss = base64_encode(json_encode($bookDetailsss));

            $customer_array = array (
            'merchant_id'               => $credentials['merchant_id'],
            'merchant_ref_no'           => '5a8c12eb19016',
            'merchant_additional_data'  => 'Additional Data',
            'amount'                    => $req->billing_price,
            // 'amount' => 1,
            'currency'                  => 'PHP',
            'description'               => $req->billing_plan_name,
            'billing_email'             => $req->billing_email,
            'billing_first_name'        => $req->billing_first_name,
            'billing_last_name'         => $req->billing_last_name,
            'billing_middle_name'       => $req->billing_middle_name,
            'billing_phone'             => $req->billing_phone,
            'billing_mobile'            => $req->billing_phone,
            'billing_address'           => $req->billing_address_1,
            'billing_address2'          => "None",
            "billing_address2"          => "N/A",
            "billing_city"              => "N/A",
            "billing_state"             => "N/A",
            "billing_zip"               => "N/A",
            "billing_country"           => $req->billing_country,
            "billing_remark"            => "N/A",
            "payment_method"            => "",
            'status_notification_url'   => 'https://0bf01cce8cc3.ngrok.io/booking/public/api/payment/status/callback?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData,
            // 'status_notification_url' => 'https://booking.tourismo.ph/api/payment/status/callback?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData,
            'success_page_url'          => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&payment=success&',
            'failure_page_url'          => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&payment=failed&',
            'cancel_page_url'           => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&payment=cancel&',
            'pending_page_url'          => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&payment=pending&',
            'secure_hash'               => $secure_hash,
            'auth_hash'                 => $auth_hash,
            'alg'                       => 'HS256',

            );
            $billing_json = json_encode($customer_array, JSON_UNESCAPED_SLASHES);
            $paymentInfo['form_data'] = utf8_decode(base64_encode(utf8_encode($billing_json)));
            $data['decodedform'] = $paymentInfo;


            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.traxionpay.com/payform-link?format=json",
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
    }


    private function get_creds()
    {
        $secret_key     = 'cxl+hwc%97h6+4#lx1au*ut=ml+=!fx85w94iuf*06=rf383xs';
        $public_key     = '7)5dmcfy^dp*9bdrcfcm$k-n=p7b!x(t)_f^i8mxl@v_+rno*x';
        $merchant_id    = "8529";
        $dataToHash     = "5a8c12eb19016500.00PHPMy Product";

        $data = array( 
            'secret_key'  => $secret_key,
            'public_key'  => $public_key,
            'merchant_id' => $merchant_id,
            'dataToHash'  => $dataToHash
        );
        return $data;

        

        return $data;
    }

    public function creds() {
		return PayCredsModel::where('temp_status',1)->first();
	}
}
