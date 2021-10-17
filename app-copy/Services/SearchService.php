<?php

namespace  App\Services;
use App\Services\SecurityServices;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
Class SearchService extends SecurityServices{


    public function findKeyWord($keyword)
    {
        $data['success'] = false;
        $data['data'] = [];
        $data['message'] = [];
        $valRes = $this->_validateKeyword($keyword);
        $data['message'] = $valRes['message'];
        $data['success'] = $valRes['success'];
        if(!$data['success']){
            return $data;
        }  

        // $hotel  = $this->searchLikeKeyword($keyword['search'],'hotels','roomname','hotel_photos');
        $tour  = $this->searchLikeKeyword($keyword['search'],'service_tour','tour_name','service_tour_photos');
        // $data['data']['hotel'] = $hotel;
        $data['data']['tour'] = $tour;
        return $data;
    }

    protected function _validateKeyword($validate)
    {
        $data['message'] = [];
        $data['success'] = false;
        $validator = Validator::make($validate, [ 
            'search' => ['required',],
        ]);

        if($validator->fails()){
            $data['message'] = $validator->errors();
            return $data;
        }
        $data['success'] = true;
        return $data;
    }

    protected function searchLikeKeyword($keyword,$table,$col,$join){
        $data = DB::table($table);
        $data = $data->where($table.'.temp_status',1);
        $data = $data->where($table.'.'.$col, 'like', '%'.$keyword.'%');
        
        // if($join == "hotel_photos"){
        //     $data = $data->join($join, 'hotels.id','hotel_photos.upload_id');
        //     $data = $data->groupBy('hotel_photos.upload_id');
        // }
        if($join == "service_tour_photos"){
            $data = $data->join('service_tour_photos','service_tour_photos.upload_id', 'service_tour.id');
            $data = $data->groupBy('service_tour_photos.upload_id');
        }
        $data = $data->get();
        if(count($data) <= 0){
            return [];
        }
        return $data;
    }

    

}