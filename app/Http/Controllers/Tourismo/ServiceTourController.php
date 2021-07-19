<?php

namespace App\Http\Controllers\Tourismo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Model\Merchant\TourPhoModel;
use App\Model\Merchant\TourModel;
use App\user\WishlistHotelsRoom;
use App\Model\Admin\LocationCountyModel;
use App\user\PageReviewsModel;
use App\Model\Merchant\ProfileModel;
use Jenssegers\Agent\Agent;

class ServiceTourController extends Controller
{
    //

    public function index(Request $req)
    {
        $id = $this->clean_input($req->id);
        $tourPhotos = $this->getPhotos($id);
        $tourDetails = $this->getTourDetails($id);
        if(empty($tourDetails) || count($tourDetails) <= 0){
            abort(404,'404 Error - the requested page does not exist.');
        }

        $wishList = $this->checkWishlist($id);
        $userCountry = $this->userCountry();
        $reviewsData = $this->getReviews($id);
        $profileID = $tourDetails[0]['profid'];
        $curDate = $this->getDateNow().'T00:00:00';
        $curDate2 = $this->getDateNowv2();
        $profileData = $this->getProfileCompany($profileID);
        
        // return $tourDetails;
        $Agent = new Agent();
        if ($Agent->isMobile()) {
        return view('tourismo.service_tour_mobile', compact(['tourPhotos', 'tourDetails','wishList','userCountry', 'reviewsData', 'profileData', 'curDate', 'curDate2']));
        }
        return view('tourismo.service_tour', compact(['tourPhotos', 'tourDetails','wishList','userCountry', 'reviewsData', 'profileData', 'curDate', 'curDate2']));
    }

    protected function getProfileCompany($id){
        $profile = new ProfileModel();
        $profile = $profile->where('id', $id);

        return $profile->get();
    }

    protected function getPhotos($id){
        $photos = new TourPhoModel();
        $photos = $photos->where('service_tour_photos.upload_id', $id);
        $photos = $photos->where('service_tour_photos.temp_status', 1);
        return $photos->get();

    }

    protected function getTourDetails($id){
        $tourDetails = new TourModel();
        $tourDetails = $tourDetails->where('id', $id);
        return $tourDetails->get();
    }

    protected function checkWishlist($id){
        if(Auth::check()){
            $checkList = WishlistHotelsRoom::where('wh_page_id', $id);
            $checkList = $checkList->where('wh_user_id', Auth::user()->id);
            $checkList = $checkList->where('wh_temp_status', 1);
            $checkList = $checkList->first();
            $datas = $checkList;
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
    
        return $data;
    
    }
}
