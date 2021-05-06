<?php

namespace App\Http\Controllers\Tourismo;

use App\Model\Admin\ProductModel;
use App\Model\Merchant\HotelModel;
use App\Model\Admin\DestinationModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class HomeController extends Controller
{

public function hotels() {

    return HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos','hotel_photos.upload_id', 'hotels.id')
    			->where('temp_status.status', 'active')->groupBy('hotel_photos.upload_id')->get();

    }

public function  room_details($id) {

   return Response::json(HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos', 'hotels.id','hotel_photos.upload_id')
    			->join('merchant_address','merchant_address.id', 'hotels.address_id')
    				->where('hotels.id', $id)->get()->first());


    // return json_encode(LocationDistrictModel::select()->where('region_id',$id)->get());

    }

public function  hotel_details($id) {

   return Response::json(HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos', 'hotels.id','hotel_photos.upload_id')
    			->join('merchant_address','merchant_address.id', 'hotels.address_id')
    				->where('hotels.id', $id)->get()->first());


    // return json_encode(LocationDistrictModel::select()->where('region_id',$id)->get());

    }
public function destination() {

    return DestinationModel::where('temp_status',1)->get();
}
public function index()
    {

    	$hotel 	= $this->hotels();
        $destination = $this->destination();
    	// $hotels_details = $this->hotel_details();

        return view('tourismo.home', compact(['hotel','destination']));
    }

public function room($id) {
	
	$room_details = HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos', 'hotels.id','hotel_photos.upload_id')
    			->join('merchant_address','merchant_address.id', 'hotels.address_id')
    				->where('hotels.id', $id)->get();

	return view('tourismo.room', compact(['room_details']));
}
function generateToken()
        {
            $secret_key = "cxl+hwc%97h6+4#lx1au*ut=ml+=!fx85w94iuf*06=rf383xs";
            $public_key = '7)5dmcfy^dp*9bdrcfcm$k-n=p7b!x(t)_f^i8mxl@v_+rno*x';
            
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
                "merchant_additional_data" => "eyJwYXltZW50X2NvZGUiOiJBQkMxMjNERUY0NTYifQ==",
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
            return $decoded;
        }
}
