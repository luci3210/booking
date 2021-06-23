<?php

namespace App\Http\Controllers\Tourismo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\user\WishlistHotelsRoom;
use App\Model\Admin\LocationCountyModel;
use App\user\PageReviewsModel;
use App\Model\Merchant\ProfileModel;
use App\Model\Merchant\HotelModel;
use App\Model\Merchant\HotelPhoMoldel;


class RoomsController extends Controller
{
    //

    public function index(Request $req)
    {
        # code...
        // $d = '2025-09-23 14:44:00';
        // date("Y-m-d H:i:s", 1624084625);
        // return strtotime($d);

        $id = $this->clean_input($req->id);
        $room_details = $this->getRoomDetails($id);
        $wishList = $this->checkWishlist($id);
        $userCountry = $this->userCountry();
        $reviewsData = $this->getReviews($id);
        $curDate = $this->getDateNow().'T00:00:00';
	    return view('tourismo.room', compact(['room_details', 'wishList', 'reviewsData','userCountry', 'curDate']));

    }

    protected function getProfileCompany($id){
        $profile = new ProfileModel();
        $profile = $profile->where('id', $id);

        return $profile->get();
    }

    protected function getRoomDetails($id){

        return $room_details = HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos', 'hotels.id','hotel_photos.upload_id')
    			->join('merchant_address','merchant_address.id', 'hotels.address_id')
    				->where('hotels.id', $id)->get();


        // $roomDetails = new HotelModel();
        // $roomDetails = $roomDetails->where('id', $id);
        // return $roomDetails->get();
    }

    protected function checkWishlist($id){
        if(Auth::check()){
            $checkList = WishlistHotelsRoom::where('wh_page_id', $id);
            $checkList = $checkList->where('wh_user_id', Auth::user()->id);
            $checkList = $checkList->where('wh_temp_status', 1);
            $checkList = $checkList->where('wh_page_name', 'hotel');
            $checkList = $checkList->first();
            $datas = $checkList;
            // $userCountry = new LocationCountyModel();
            // $userCountry = $userCountry->where('id',Auth::user()->country);
            // $userCountry = $userCountry->get();
            if($checkList != null){
              return true;
            }
            return false;
        }
        return false;

    }

    protected function userCountry(){
        if(Auth::check()){
            $userCountry = new LocationCountyModel();
            $userCountry = $userCountry->where('id',Auth::user()->country);
            return $userCountry->get();
        }
        return [];

    }

    protected function getReviews($id){
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

        return $reviewsData;
    }

}
