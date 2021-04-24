<?php

namespace App\Http\Controllers\Tourismo;

use App\Model\Admin\ProductModel;
use App\Model\Merchant\HotelModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     //$this->middleware('auth');
    // }

public function hotels() {

    return HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos','hotel_photos.upload_id', 'hotels.id')
    			->where('temp_status.status', 'active')->groupBy('hotel_photos.upload_id')->get();

    }

public function  room_details($id) {

   return Response::json(HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos', 'hotels.id','hotel_photos.upload_id')
    			->join('merchant_address','merchant_address.id', 'hotels.address_id')
    				->where('hotels.id', $id)->get()->first());


    // return json_encode(LocationDistrictModel::select()->where('region_id',$id)->get());

    }

public function  hotel_details($id) {

   return Response::json(HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos', 'hotels.id','hotel_photos.upload_id')
    			->join('merchant_address','merchant_address.id', 'hotels.address_id')
    				->where('hotels.id', $id)->get()->first());


    // return json_encode(LocationDistrictModel::select()->where('region_id',$id)->get());

    }
public function index()
    {

    	$hotel 	= $this->hotels();
    	// $hotels_details = $this->hotel_details();

        return view('tourismo.home', compact(['hotel','hotels_details']));
    }

public function room($id) {
	
	$room_details = HotelModel::join('users','users.id', 'hotels.profid')
    	->join('temp_status','temp_status.id', 'hotels.temp_status')
    		->join('hotel_photos', 'hotels.id','hotel_photos.upload_id')
    			->join('merchant_address','merchant_address.id', 'hotels.address_id')
    				->where('hotels.id', $id)->get();

	return view('tourismo.room', compact(['room_details']));
}
}
