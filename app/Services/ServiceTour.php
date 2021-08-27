<?php

namespace  App\Services;
use App\Services\SecurityServices;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Model\Merchant\TourPhoModel;
use App\Model\Merchant\TourModel;
use App\user\WishlistHotelsRoom;
use App\Model\Admin\LocationCountyModel;
use App\user\PageReviewsModel;
use App\Model\Merchant\ProfileModel;
use App\user\PaymentModel;
use App\Model\Tourismo\FavoritesModel;

use App\User;


Class ServiceTour extends SecurityServices{


    public function checkUserFields(){

        $userID = Auth::user()->id;

        $userData = User::find($userID);
        return $userData;

    }

    public function getToursv2($serviceType, $limit, $page)
    {

        $tourModel = new TourModel();
        $tourModel = $tourModel->join('service_tour_photos','service_tour_photos.upload_id', 'service_tour.id');
        $tourModel = $tourModel->join('profiles','profiles.id', 'service_tour.profid');
        $tourModel = $tourModel->join('locations_district','locations_district.id', 'service_tour.district');
        $tourModel = $tourModel->join('location_country','location_country.id', 'locations_district.country_id');
        $tourModel = $tourModel->join('products','service_tour.service_id', 'products.id');
        if($serviceType != 'all') {
            $tourModel = $tourModel->where('products.description', $serviceType);
        }

        $tourModel = $tourModel->where('service_tour.temp_status', 1);
        $tourModel = $tourModel->where('service_tour_photos.temp_status', 1);
        $tourModel = $tourModel->groupBy('service_tour.id');
        $offset = ($page >= 3) ? ($page* $limit) - $limit : (($page == 2 ) ? $limit: 0);
        $tourModel = $tourModel->offset($offset);
        $tourModel = $tourModel->limit($limit)->get();
        return $tourModel;
        
    } 

    public function getNearBy($userLat, $userLng)
    {
        $nearest = DB::select(DB::raw("SELECT * , (3956 * 2 * ASIN(SQRT( POWER(SIN(( $userLat - `lat`) *  pi()/180 / 2), 2) +COS( $userLat * pi()/180) * COS(`lat` * pi()/180) * POWER(SIN(( $userLng - `lng`) * pi()/180 / 2), 2) ))) as distance  
        from `service_tour` 
        INNER JOIN `service_tour_photos` on service_tour.id =  service_tour_photos.upload_id
        INNER JOIN `profiles` on service_tour.profid =  profiles.id
        INNER JOIN `locations_district` on service_tour.district = locations_district.id 
        INNER JOIN `location_country` on locations_district.country_id = location_country.id
        INNER JOIN `products` on products.id = service_tour.service_id
        group by service_tour_photos.upload_id
        having  distance <= 10 
        order by distance
        ") );
        return $nearest;
       
        
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
    } // get multiple service tour with filter
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
    } //  get reviews of selected service tour


    public function getMyFavorites($limit,$page)
    {

        $user = Auth::user();
        $checkList = FavoritesModel::where('fv_user_id', $user->id);
        $checkList = $checkList->where('fv_temp_status', 1);
        $checkList = $checkList->join('service_tour', 'service_tour.id', '=', 'favorites.fv_tour_id');
      
        $offset = ($page >= 3) ? ($page* $limit) - $limit : (($page == 2 ) ? $limit: 0);
        $checkList = $checkList->offset($offset);
        $checkList = $checkList->limit($limit)->get();

        return $checkList;


    }

    public function addBooking($bookdata)
    {
        $user = Auth::user();

        $data['pm_user_id'] = $user->id;
        $data['pm_page_id'] = $this->clean_input((int)$bookdata['tour_id']);
        $data['pm_payment_status'] = 'pending';
        $data['pm_book_date'] = $bookdata['from'];
        $data['pm_book_date_to'] = $bookdata['to'];
        $data['pm_book_amount'] = $bookdata['amount'];
        $data['pm_child_count'] = $bookdata['childrenCount'];
        $data['pm_adult_count'] = $bookdata['adultCount'];
        $data['pm_book_qty'] = $bookdata['qty'];
        $data['pm_created_at'] = $this->getDatetimeNow();
        $data['pm_id'] = PaymentModel::insertGetId($data); // save return
        return $data;
    }

    public function getBooking($limit,$page)
    {
        $user = Auth::user();

        $data = new PaymentModel();
        $data = $data->where('pm_user_id',$user->id);
        $data = $data->join('status_payment', 'status_payment.ps_id', '=', 'payments.pm_ps_id');
        $data = $data->join('service_tour', 'service_tour.id', '=', 'payments.pm_page_id');
        $offset = ($page >= 3) ? ($page* $limit) - $limit : (($page == 2 ) ? $limit: 0);
        $data = $data->offset($offset);
        $data = $data->limit($limit)->get();


        return $data;

    }



}