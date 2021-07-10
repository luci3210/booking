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
use App\User;



Class ServiceTour extends SecurityServices{


    public function checkUserFields(){

        $userID = Auth::user()->id;

        $userData = User::find($userID);
        return $userData;

    }


    public function getTours($service, $limit, $offset)
    {
        $data['success'] = false;
        $data['message'] = [];
        $data['data'] = [];
        $tourDetails = new TourModel();
        $tourDetails = $tourDetails->join('profiles','profiles.id', 'service_tour.profid');
        $tourDetails = $tourDetails->join('service_tour_photos','service_tour_photos.upload_id', 'service_tour.id');
        $tourDetails = $tourDetails->groupBy('service_tour.id');
        if($service != 'service'){
            $tourDetails = $tourDetails->where('service_tour.service_id',$service);
        }
        if($offset != 'offset' && $limit == 'limit'){
            $data['message']['error'] = 'add limit when using offset';
            return $data;
        }
        if($offset != 'offset'){
            $tourDetails = $tourDetails->skip($offset);
        }
        if($limit != 'limit'){
            $tourDetails = $tourDetails->take($limit);
        }
        $tourDetails = $tourDetails->get();
        $tourDetails = $tourDetails->makeHidden(
        [ 
        'plan_id', 
        'user_id', 
        'id',
        'account_id',
        'merchant_id',
        'upload_id'
        ]);
        
        $countData = count($tourDetails);
        if($countData <= 0){
            $data['message']['error'] = 'no data found';
            return $data;
        }
        $data['data']['tour'] = $tourDetails;
        $data['message']['success'] = $countData.' service tour found';
        $data['success'] = true;
        return $data;
    }// get multiple service tour with filter
    public function findTour($id)
    {

        $data['success'] = false;
        $data['message'] = [];
        $data['data'] = [];

        $tourDetails = new TourModel();
        $tourDetails = $tourDetails->where('service_tour.id', $id);
        $tourDetails = $tourDetails->join('profiles','profiles.id', 'service_tour.profid');
        // $tourDetails = $tourDetails->join('service_tour_photos','service_tour_photos.upload_id', 'service_tour.id');
        // $tourDetails = $tourDetails->groupBy('service_tour.id');
        $tourDetails = $tourDetails->first();
        $tourDetails = $tourDetails->makeHidden(
        ['plan_id', 'user_id', 'id']);
        if(empty($tourDetails)){
            $data['message'] = ['error'=>'no tour found'];
            return $data;

        }

        $data['success'] = true;
        $data['data']['tour'] = $tourDetails;
        $data['data']['reviews'] = $this->getReviews($id);
        $data['data']['photos'] = $this->getPhotos($id);
        return $data;
        
    }// get one service tour

    protected function getPhotos($id){
        $tourPhotos = new TourPhoModel();
        $tourPhotos = $tourPhotos->where('service_tour_photos.upload_id',$id);
        $tourPhotos = $tourPhotos->where('service_tour_photos.temp_status',1);
        $tourPhotos = $tourPhotos->get();
        $tourPhotos = $tourPhotos->makeHidden(
        ['merchant_id','id','upload_id','temp_status']);
        return $tourPhotos;
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
        'pr_user_id',
        'pr_page_id',
        'pr_id'
        ]));
        return $reviewsData;
    }//  get reviews of selected service tour



}