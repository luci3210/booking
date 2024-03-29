<?php

namespace App\Http\Controllers\Tourismo;

use App\Model\Merchant\TourModel;
use App\Model\Admin\ProductModel;

use App\Model\Merchant\TourPhoModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Jenssegers\Agent\Agent;

//use Illuminate\Support\Facades\Auth;


class ServicesController extends Controller
{
    public function __construct()
    {

    }

    public function service($req) {

        // $data = ProductModel::join('service_tour','products.id','service_tour.service_id')->join('service_tour_photos','service_tour.id','service_tour_photos.upload_id')->where('service_tour.temp_status',1)->where('products.description',$req)->groupBy('service_tour.id')->paginate(25);
        $data = $this->getTourType($req);
        // return $data;
        if($data->isEmpty()) {
        
            abort(404,'404 Error - the requested page does not exist.');
        
        } else {
            $Agent = new Agent();
            if ($Agent->isMobile()) {
                return view('tourismo.services.services_index_mobile',compact('data'));
            }else{
                return view('tourismo.services.services_index',compact('data'));
            }

        
        }
        
    }

    protected function getTourType($tour_type) {



        $data = TourModel::
                join('locations_district','locations_district.id', 'service_tour.district')
                ->join('location_country','location_country.id', 'locations_district.country_id')
                ->join('products','service_tour.service_id', 'products.id')
                ->join('profiles','profiles.id', 'service_tour.profid')
                ->join('service_tour_photos','service_tour_photos.upload_id', 'service_tour.id')
                ->where([['products.description',$tour_type]])
                ->groupBy('service_tour.id')
                ->get(['service_tour_photos.*','service_tour.cover','service_tour.tour_name','service_tour.price','service_tour.nonight','service_tour.noguest','location_country.*','locations_district.*','products.description','products.name']);
        return $data;

    }

    public function service_get_all($req) {

        $data = ProductModel::join('service_tour','products.id','service_tour.service_id')->join('service_tour_photos','service_tour.id','service_tour_photos.upload_id')->where('service_tour.temp_status',1)->where('products.description',$req)->groupBy('service_tour.id')->get();

        if($data->isEmpty()) {
        
            abort(404,'404 Error - the requested page does not exist.');
        
        } else {

            return view('tourismo.services.index',compact('data'));
        
        }
        
    }


    

    public function index()
    {
		$product = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
	       ->where('products.temp_status','=','1')->select(['products.*','temp_status.status'])->orderBy('name', 'desc')->paginate(10);

    	return view('tourismo.services.index',compact('product'));
    }
    public function menu($id)
    {
		$menu = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
	       ->where('products.id','=',$id)->select(['products.*','temp_status.status'])->first();

	    return view('tourismo.services.index',compact('menu'));
    }

    public function store($id)
    {

    	$product = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
	       ->where('products.temp_status','=','1')->select(['products.*','temp_status.status'])->orderBy('name', 'desc')->paginate(10);

    	$list = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
	       ->where('products.id','=',$id)->select(['products.*','temp_status.status'])->orderBy('name', 'desc')->paginate(10);

        return view('tourismo.services.list',compact('product','list'));
  
    }

}
