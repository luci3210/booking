<?php

namespace App\Http\Controllers\Admin;

use App\Model\Merchant\TourModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostRequestController extends Controller
{
    function __construct() {

        $this->middleware('auth:admin');
    }

    public function index($url) {

        $posting = $this->get_posting_list();

        return view('admin.posting_request.index',compact(['posting']));

    }

    public function posting_check(Request $id, $url) {

        
        $posting = $this->get_posting($id);

        return view('admin.posting_request.index',compact(['posting']));        

    }

    public function get_posting($id) {

        return TourModel::join('profiles','profiles.id','service_tour.profid')->join('products','products.id','service_tour.service_id')->where('service_tour.id',$id)->whereIn('service_tour.temp_status',[2,3])->orderBy('service_tour.id','desc')->first(['profiles.company','products.name','service_tour.price','service_tour.tour_name','service_tour.temp_status as ts','service_tour.id as serviceid']);    
        
    }

    public function get_posting_list() {

        return TourModel::join('profiles','profiles.id','service_tour.profid')->join('products','products.id','service_tour.service_id')->whereIn('service_tour.temp_status',[2,3])->orderBy('service_tour.id','desc')->get(['profiles.company','products.name','service_tour.price','service_tour.tour_name','service_tour.temp_status as ts','service_tour.id as serviceid']);    
        
    }
}
