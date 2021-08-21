<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Merchant\TourModel;
use App\Model\Tourismo\ServiceTourPhotosModel;
use App\Model\Tourismo\FavoritesModel;
use App\user\PageReviewsModel;

// tools
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class ServiceTourMobController extends Controller
{
    //

    public function getTours(Request $req)
    {   
        try{
            $service_id = $req->service_id;
            $limit = $req->tour_limit;

            $response = [
                'success_flag'=>false,
                'message' => null,
                'data'=> null,
            ];
            
            $tourModel = new TourModel();
            $tourModel = $tourModel->join('service_tour_photos','service_tour_photos.upload_id', 'service_tour.id');
            $tourModel = $tourModel->join('profiles','profiles.id', 'service_tour.profid');
            $tourModel = $tourModel->join('locations_district','locations_district.id', 'service_tour.district');
            $tourModel = $tourModel->join('location_country','location_country.id', 'locations_district.country_id');
            $tourModel = $tourModel->join('products','service_tour.service_id', 'products.id');
            if($service_id != 'service_id') {
                $tourModel = $tourModel->where('service_tour.service_id', $service_id);
            }

            $tourModel = $tourModel->where('service_tour.temp_status', 1);
            $tourModel = $tourModel->where('service_tour_photos.temp_status', 1);
            $tourModel = $tourModel->groupBy('service_tour.id');
            $tourModel = $tourModel->inRandomOrder();
            if($limit != 'limit'){
                $tourModel = $tourModel->limit($limit)->get();
            }else{
                $tourModel = $tourModel->get();
            }
            if(count($tourModel) <= 0){
                $response['success_flag'] = false;
                $response['message']['error'] = 'no data found';
                return response($response, 403);
            }

            
            $response['success_flag'] = true;
            $response['data']['tour'] = $tourModel;
            return response($response, 201);

        }catch (\Exception $e) {

            return response('not authorized', 401);


        }
    }

    public function getTourOne(Request $req)
    {
        try{
            $tour_id = $req->tour_id;
            $response = [
                'success_flag'=>false,
                'message' => null,
                'data'=> null,
            ];

            $tourModel = new TourModel();
            $tourModel = $tourModel->join('profiles','profiles.id', 'service_tour.profid');
            $tourModel = $tourModel->join('locations_district','locations_district.id', 'service_tour.district');
            $tourModel = $tourModel->join('location_country','location_country.id', 'locations_district.country_id');
            $tourModel = $tourModel->join('products','service_tour.service_id', 'products.id');
            $tourModel = $tourModel->where('service_tour.id', $tour_id);
            $tourModel = $tourModel->get([
                'service_tour.*', 
                'service_tour.id as itemID', 
                'profiles.*',
                'locations_district.*',
                'location_country.*',
                'products.*'
            ]);
            if(count($tourModel) <= 0){
                $response['message']['error'] = 'no data found';
                return response($response, 403);
            }

            $photos = new ServiceTourPhotosModel();
            $photos = $photos->where('upload_id',$tourModel[0]['itemID']);
            $photos = $photos->where('temp_status',1);
            $photos = $photos->get();


            $response['success_flag'] = true;
            $response['data']['tour'] = $tourModel;
            $response['data']['img'] = $photos;
            return response($response, 201);

        }catch (\Exception $e) {

            return response('not authorized', 401);


        }

        
    }

    public function getNearBy(Request $req)
    {
        try{
            $response = [
                'success_flag'=>false,
                'message' => null,
                'data'=> null,
            ];

            $userLat = $req->lat;
            $userLng = $req->lng;

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
            if(count($nearest) <= 0){
                $response['message']['error'] = 'no data found';
                return response($response, 403);
            }

          

            $response['success_flag'] = true;
            $response['data']['tour'] = $nearest;
            return response($response, 201);

        }catch (\Exception $e) {

            return response('not authorized', 401);


        }
        
    }


    public function toggle_favorites(Request $req)
    {
        try{
            $response = [
                'success_flag'=>false,
                'message' => null,
                'data'=> null,
            ];

            $tour_id = $req->tour_id;
            $user_id = $req->user_id;
            $checkList = FavoritesModel::where('fv_tour_id', $tour_id);
            $checkList = $checkList->where('fv_user_id', $user_id);
            $checkList = $checkList->where('fv_temp_status', 1);
            $checkList = $checkList->first();

            if($checkList != null){
                $response['message']['success'] = 'removed';
                $checkList->fv_temp_status = 4;
                $checkList->update();
                $response['success_flag'] = true;
            }

            if($checkList == null){
                $response['success_flag'] = true;
                $response['message']['success'] = 'added';
                $addToWishList = new FavoritesModel();
                $addToWishList->fv_tour_id =$tour_id;
                $addToWishList->fv_user_id = $user_id;
                $addToWishList->save();
            }

            return response($response, 201);

        }catch (\Exception $e) {

            return response('not authorized', 401);

        }
    }

    public function submit_tour_review(Request $req)
    {

    }

    public function get_tour_review(Request $req)
    {

    }

    public function submit_booking(Request $req)
    {

    }

    public function get_booking_record(Request $req)
    {

    }

   



}
