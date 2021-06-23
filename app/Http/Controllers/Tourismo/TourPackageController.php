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

class TourPackageController extends Controller
{
    //

    public function index(Request $req)
    {
        $id = $this->clean_input($req->id);
        $tourPhotos = $this->getPhotos($id);
        $tourDetails = $this->getTourDetails($id);

        $wishList = $this->checkWishlist($id);
        $userCountry = $this->userCountry();
        $reviewsData = $this->getReviews($id);
        $profileID = $tourDetails[0]['profid'];
        $curDate = $this->getDateNow().'T00:00:00';
        $profileData = $this->getProfileCompany($profileID);


        return view('tourismo.tour_package', compact(['tourPhotos', 'tourDetails','wishList','userCountry', 'reviewsData', 'profileData', 'curDate']));
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
            $checkList = $checkList->where('wh_page_name', 'tour');
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
