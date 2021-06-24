<?php

namespace App\Http\Controllers\Tourismo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\user\WishlistHotelsRoom;
use App\Model\Admin\LocationCountyModel;
use App\user\PageReviewsModel;
use App\Model\Merchant\ProfileModel;
use App\Model\Merchant\TourPhoModel;
use App\Model\Merchant\TourModel;


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
        $tourDetails = $this->getRoomDetails($id);
        $tourPhotos = $this->getPhotos($id);

        $wishList = $this->checkWishlist($id);
        $userCountry = $this->userCountry();
        $reviewsData = $this->getReviews($id);
        $profileID = $tourDetails[0]['profid'];
        $curDate = $this->getDateNow().'T00:00:00';
        $profileData = $this->getProfileCompany($profileID);

        // return $userCountry;
        
        return view('tourismo.tour_rooms_hotel', compact(['tourDetails', 'tourPhotos', 'profileData', 'wishList', 'reviewsData','userCountry', 'curDate']));

    }

    protected function getPhotos($id){
        $photos = new TourPhoModel();
        $photos = $photos->where('service_tour_photos.upload_id', $id);
        $photos = $photos->where('service_tour_photos.temp_status', 1);
        return $photos->get();

    }

    protected function getProfileCompany($id){
        $profile = new ProfileModel();
        $profile = $profile->where('id', $id);
        return $profile->get();
    }

    protected function getRoomDetails($id){
        $tourDetails = new TourModel();
        $tourDetails = $tourDetails->where('id', $id);
        return $tourDetails->get();
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
