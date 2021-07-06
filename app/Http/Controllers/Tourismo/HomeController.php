<?php

namespace App\Http\Controllers\Tourismo;

use App\Model\Admin\ProductModel;
use App\Model\Merchant\HotelModel;
use App\Model\Merchant\ProfileModel;
use App\Model\Merchant\TourModel;
use App\Model\Admin\DestinationModel;
use App\Model\Admin\ExclusiveModel;
use App\Model\Admin\BannerModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Auth;
use App\user\WishlistHotelsRoom;
use App\user\PageReviewsModel;

use App\Model\Admin\LocationCountyModel;

use Jenssegers\Agent\Agent;


class HomeController extends Controller
{

    public function hotels() {

    return HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos','hotel_photos.upload_id', 'hotels.id')
    			->where('temp_status.status', 'active')
            ->select(['hotels.*','temp_status.*','hotel_photos.*','users.*'])
            ->groupBy('hotel_photos.upload_id')->limit(4)->get();

    }

    public function  room_details($id) {
    

   return Response::json(HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos', 'hotels.id','hotel_photos.upload_id')
    			->join('merchant_address','merchant_address.id', 'hotels.address_id')
    				->where('hotels.id', $id)->get()->first());

    // return json_encode(LocationDistrictModel::select()->where('region_id',$id)->get());

    }

    public function  hotel_details($id) 
    {

        return Response::json(HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos', 'hotels.id','hotel_photos.upload_id')
    			->join('merchant_address','merchant_address.id', 'hotels.address_id')
    				->where('hotels.id', $id)->get()->first());


    // return json_encode(LocationDistrictModel::select()->where('region_id',$id)->get());

    }
    public function banner() 
    {

        return BannerModel::where('banners.temp_status',1)->where('banners.location',1)->get(['banners.banner_img','banners.short_des','banners.long_desc']);

    }

    protected function getServiceTourData($service_id,$limit)
    {

        $tourModel = new TourModel();
        $tourModel = $tourModel->join('service_tour_photos','service_tour_photos.upload_id', 'service_tour.id');
        $tourModel = $tourModel->join('profiles','profiles.id', 'service_tour.profid');
        $tourModel = $tourModel->where('service_tour.service_id', $service_id);
        $tourModel = $tourModel->where('service_tour.temp_status', 1);
        $tourModel = $tourModel->where('service_tour_photos.temp_status', 1);
        // $tourModel = $tourModel->random();
        $tourModel = $tourModel->groupBy('service_tour.id');
        return $tourModel->inRandomOrder()->limit($limit)->get();
        
    }

    public function index()
    {

    	$home_hotel 	= $this->hotels();
        $destination    = $this->destination();
        $international    = $this->desni_international();
        $tourismo_exlusive    = $this->tourismo_exlusive();
        $hotels         = $this->hotel();
        $tour_package   = $this->tour_package(); 

        $tour_packages   = $this->getServiceTourData('10011',10); // new from service_tour tbl
    	$hotel_packages 	= $this->getServiceTourData('10016',10); // new from service_tour tbl
    	$exclusive_packages 	= $this->getServiceTourData('100113',10); // new from service_tour tbl
        $banner            = $this->banner();
        $icountry = $this->get_country($country = "Philippines");


        // return $hotel_packages;

        $Agent = new Agent();
        if ($Agent->isMobile()) {
            return view('tourismo.home_mobile', compact(['icountry', 'banner','tourismo_exlusive','international','home_hotel','destination','hotels','tour_package','tour_packages', 'hotel_packages', 'exclusive_packages']));

        } else {
            return view('tourismo.home', compact(['icountry','banner','tourismo_exlusive','international','home_hotel','destination','hotels','tour_package','tour_packages', 'hotel_packages', 'exclusive_packages']));

        }
        



        

    }
    
    


public function room($id) {
	
	$room_details = HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos', 'hotels.id','hotel_photos.upload_id')
    			->join('merchant_address','merchant_address.id', 'hotels.address_id')
    				->where('hotels.id', $id)->get();

    $wishList = false;
    $userCountry = [];
    if(Auth::check()){
        $checkList = WishlistHotelsRoom::where('wh_page_id', $id);
        $checkList = $checkList->where('wh_user_id', Auth::user()->id);
        $checkList = $checkList->where('wh_temp_status', 1);
        $checkList = $checkList->where('wh_page_name', 'hotel');
        $checkList = $checkList->first();
        $datas = $checkList;
        

        $userCountry = new LocationCountyModel();
        $userCountry = $userCountry->where('id',Auth::user()->country);
        $userCountry = $userCountry->get();

        if($checkList != null){
            $wishList = true;
        }
    }
    $reviewsData = new PageReviewsModel();
    $reviewsData = $reviewsData->where('page_reviews.pr_temp_status', 1);
    $reviewsData = $reviewsData->where('page_reviews.pr_page_id', $id);
    $reviewsData = $reviewsData->join('users', 'page_reviews.pr_user_id', 'users.id');
    $reviewsData = $reviewsData->paginate(2);
    $reviewsData = $reviewsData->setCollection($reviewsData->getCollection()->makeHidden(
    ['id',
    'password', 
    'email',
    'created_at',
    'updated_at',
    'bdate',
    'accnt_nu',
    'address',
    'pnumber',
    'remember_token',
    'email_verified_at',
    'job',
    ]));


	return view('tourismo.room', compact(['room_details', 'wishList', 'reviewsData','userCountry']));
    $data['user'] = Auth::user();
    $data['couttry'] = $userCountry;
    return $data;
}
    public function toggle_wishlist(Request $req) {
        
        $data['error'] = [];
        $data['data'] = [];
        $data['success'] = false;
        $data['msg'] = [];
        $wishlist_id = $req->data_id;
        $checkList = WishlistHotelsRoom::where('wh_hotel_id', $wishlist_id);
        $checkList = $checkList->where('wh_user_id', Auth::user()->id);
        $checkList = $checkList->where('wh_temp_status', 1);
        $checkList = $checkList->first();
        if($checkList != null){
            $data['msg'] = 'removed';
            $checkList->wh_temp_status = 4;
            $checkList->update();
            $data['success'] = true;

        }
        if($checkList == null){
            $data['msg'] = 'added';
            $data['success'] = true;
            $addToWishList = new WishlistHotelsRoom();
            $addToWishList->wh_hotel_id =$wishlist_id;
            $addToWishList->wh_user_id = Auth::user()->id;
            $addToWishList->save();
        }

        // $data['data'] = $wishlist_id;
        return $data;

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




// ------------------- DESTINATION ----------------------------------

public function get_country($country) {

    return LocationCountyModel::where('country',$country)->get()->first();
}

public function page_destination() {

    $destination    = $this->destination();
    $region_one     = $this->destination_reg_one();
    $region_ten     = $this->destination_reg_ten();

    return view('tourismo.destination', compact('icountry','destination','region_one','region_ten'));
}

public function page_region($id) {

    $destination    = $this->destination();

    $region =  DestinationModel::join('locations_district','locations_district.id','destinations.destination_id')
            ->join('locations_region','locations_region.id','locations_district.region_id')
            ->where('locations_district.region_id',$id)
            ->where('destinations.temp_status',1)
                ->get(['locations_district.*','destinations.*','locations_region.*']);

    return view('tourismo.region', compact('region','destination'));
} 

public function page_provice($id) {

    $province = HotelModel::join('users','users.id', 'hotels.profid')
        ->join('temp_status','temp_status.id', 'hotels.temp_status')
            ->Join('hotel_photos','hotel_photos.upload_id', 'hotels.id')
                ->join('locations_district','locations_district.id','hotels.district')
                    ->join('location_country','location_country.id','locations_district.country_id')
                ->where('hotels.district', $id)
                 ->where('temp_status.status', 'active')
            ->select('hotels.*','temp_status.*','hotel_photos.*','users.*','locations_district.district as provice_name','location_country.*')
            // ->groupBy('hotels.id')
            ->groupBy('hotel_photos.upload_id')
            ->get();
            // ->paginate(8);

    if($province->isEmpty()) {
        
        $data = 'Data not found.!';
        return view('errors.datanotfound', compact('data'));
    } else {

        return view('tourismo.provice', compact(['province']));
    }
}

public function destination() {
    
    return DestinationModel::join('locations_district','locations_district.id','destinations.destination_id')
            ->where([ ['destinations.temp_status','=',1],
                ['destinations.country_id','=',1] ])
                ->get(['locations_district.id as provice_id','destinations.*']);
}

public function tourismo_exlusive() {
    $exclusive_tourismo = new ExclusiveModel();
    $exclusive_tourismo = $exclusive_tourismo->where('exclusives.temp_status',1);
    $exclusive_tourismo = $exclusive_tourismo->get();
    return  $exclusive_tourismo;
}

public function desni_international() {

    return DestinationModel::join('locations_district','locations_district.id','destinations.destination_id')
            ->where([ ['destinations.temp_status','=',1],
                ['destinations.country_id','<>',1] ])
                ->get(['locations_district.id as provice_id','destinations.*']);
}

public function destination_reg_one() { 

    return DestinationModel::join('locations_district','locations_district.id','destinations.destination_id')
                ->where('locations_district.region_id',18)
                ->where('destinations.temp_status',1)
                    ->get(['locations_district.*','destinations.*']);
}

public function destination_reg_ten() { 

    return DestinationModel::join('locations_district','locations_district.id','destinations.destination_id')
                ->where('locations_district.region_id',3)
                ->where('destinations.temp_status',1)
                    ->get(['locations_district.*','destinations.*']);
}







// ---------------------  HOTELS -----------------------------

public function page_hotels() {

    $hotel      = $this->hotel();

    return view('tourismo.hotel_and_resort', compact('hotel'));
}

public function page_tour_operator() {

    $tour_package = $this->tour_package();
    
    return view ('tourismo.tour_operator', compact('tour_package'));   
}

public function hotel() {
    return ProfileModel::where('type',10016)->where('temp_status',1)->get();
}

public function tour_package() {

    return ProfileModel::where('type',10011)->where('temp_status',1)->get();
}

}
