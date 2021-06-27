<?php

namespace App\Http\Controllers\Admin;

use App\Model\Merchant\TourModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminPostingUpdateStatus;


class PostRequestController extends Controller
{
    function __construct() {

        $this->middleware('auth:admin');
    }

    public function index($url) {

        $posting = $this->get_posting_list();

        return view('admin.posting_request.index',compact(['posting']));

    }

    public function posting_check($id, $url) {
        
        $posting = $this->get_posting($id);
        return view('admin.posting_request.posting_form_edit',compact(['posting']));        

    }

    public function get_posting($id) {

        return TourModel::join('profiles','profiles.id','service_tour.profid')->join('products','products.id','service_tour.service_id')->where('service_tour.id',$id)->whereIn('service_tour.temp_status',[1,2,3])->get(['*','service_tour.id as service_tour_id'])->first();    
        
    }

    public function get_posting_list() {

        return TourModel::join('profiles','profiles.id','service_tour.profid')->join('products','products.id','service_tour.service_id')->whereIn('service_tour.temp_status',[2,3])->orderBy('service_tour.id','desc')->get(['profiles.company','products.name','service_tour.price','service_tour.tour_name','service_tour.temp_status as ts','service_tour.id as serviceid']);    
        
    }

    public function update_posting_status(AdminPostingUpdateStatus $request, $id, $url) {

            TourModel::where('id',$id)->update(['temp_status' =>$request->status]);
            return redirect()->back()->withSuccess('Successfully Updated!');
    }
}
