<?php

namespace  App\Services;
use App\Services\SecurityServices;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


use App\Model\Merchant\TourPhoModel;
use App\Model\Merchant\TourModel;
use App\user\WishlistHotelsRoom;
use App\Model\Admin\LocationCountyModel;
use App\user\PageReviewsModel;
use App\Model\Merchant\ProfileModel;



Class ServiceTour extends SecurityServices{



    public function findTour($id)
    {

        $data['success'] = false;
        $data['message'] = [];
        $data['data'] = [];

        $tourDetails = new TourModel();
        $tourDetails = $tourDetails->where('service_tour.id', $id);
        $tourDetails = $tourDetails->join('profiles','profiles.id', 'service_tour.profid');
        $tourDetails = $tourDetails->join('service_tour_photos','service_tour_photos.upload_id', 'service_tour.id');
        $tourDetails = $tourDetails->groupBy('service_tour.id');
        $tourDetails = $tourDetails->first();
        if(empty($tourDetails)){
            $data['message'] = ['error'=>'no tour found'];
            return $data;

        }

        $data['success'] = true;
        $data['data']['tour'] = $tourDetails;
        $data['data']['reviews'] = $this->getReviews($id);
        return $data;
        
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