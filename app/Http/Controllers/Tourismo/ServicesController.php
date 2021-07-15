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

        $data = ProductModel::join('service_tour','products.id','service_tour.service_id')->join('service_tour_photos','service_tour.id','service_tour_photos.upload_id')->where('service_tour.temp_status',1)->where('products.description',$req)->groupBy('service_tour.id')->paginate(25);

        if($data->isEmpty()) {
        
            abort(404,'404 Error - the requested page does not exist.');
        
        } else {
            $Agent = new Agent();
            if ($Agent->isMobile()) {
                return view('tourismo.services.index_mobile',compact('data'));
            }else{
                return view('tourismo.services.index',compact('data'));
            }

        
        }
        
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
