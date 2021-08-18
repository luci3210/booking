<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Merchant\TourModel;
use App\Model\Tourismo\ServiceTourPhotosModel;


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
            $response['data'] = $tourModel;
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
            $response['data']['info'] = $tourModel;
            $response['data']['img'] = $photos;
            return response($response, 201);

        }catch (\Exception $e) {

            return response('not authorized', 401);


        }

        
    }
}
