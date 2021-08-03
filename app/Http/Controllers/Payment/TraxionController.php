<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\PayCredsModel;
use App\Services\PaymentService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TraxionController extends Controller
{
    //

    public function generate_link(Request $req)
    {
        try{
            $bookData   = array(
                'pm_book_date' => $req->book_date_from,
                'pm_book_date_to' => $req->book_date_to,
                'pm_page_id' => $req->uid,
                'pm_payment_status' => 'pending',
                'pm_book_amount' => $req->billing_price,
                'pm_adult_count' => $req->adult_count,
                'pm_child_count' => $req->children_count,
                'pm_book_qty' => $req->book_qty,
                'pm_user_id' => $req->myid,
            );
            $paymentService = new PaymentService();
            $extraData = $paymentService->SavePaymentV2($bookData);

            $contactData = array(
                'user_email' => $req->billing_email,
                'user_fname' => $req->billing_first_name,
                'user_mname' => $req->billing_last_name,
                'user_lname' => $req->billing_middle_name,
            );

            $contactData = base64_encode(json_encode($contactData));


            $credentials    = $this->get_creds();
            // traxion creds

            $secure_hash = hash_hmac('sha256', $credentials['dataToHash'], $credentials['secret_key'], false);
            $auth_hash = hash_hmac('sha256', $credentials['public_key'], $credentials['secret_key'], false);
            // hash

            $bookDetailsss['uid'] = $req->uid;
            $bookDetailsss = base64_encode(json_encode($bookDetailsss));

            $customer_array = array (
            'merchant_id'               => $credentials['merchant_id'],
            'merchant_ref_no'           => '5a8c12eb19016',
            'merchant_additional_data'  => 'Additional Data',
            // 'amount'                    => $req->billing_price,
            'amount' => 1,
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
            // 'status_notification_url'   => 'https://8fa8bc3668f4.ngrok.io/booking/public/api/payment/status/callback?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&contact='.$contactData,
            'status_notification_url' => 'https://booking.tourismo.ph/api/payment/status/callback?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData,
            'success_page_url'          => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&contact='.$contactData.'&payment=success&',
            'failure_page_url'          => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&contact='.$contactData.'&payment=failed&',
            'cancel_page_url'           => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&contact='.$contactData.'&payment=cancel&',
            'pending_page_url'          => $req->url_callback.'?details='.$bookDetailsss.'&cn='.$req->proid.'&extra='.$extraData.'&contact='.$contactData.'&payment=pending&',
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
