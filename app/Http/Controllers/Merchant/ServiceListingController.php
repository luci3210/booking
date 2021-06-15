<?php

namespace App\Http\Controllers\Merchant;

use App\Model\Admin\ProductModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceListingController extends Controller
{

    public function __construct() {

        $this->middleware('auth:web');
    }

    public function desc_name($desc)  {

        return  ProductModel::where('temp_status',1)->where('description',$desc)->get(['name','description'])->first();

    }

    public function index($desc) {

        $service_name = $this->desc_name($desc);

        return view('merchant_dashboard.service.index',compact('service_name'));
    }

    public function service_create_post($desc) {

        $service_name = $this->desc_name($desc);

        return view('merchant_dashboard.service.create_form',compact('service_name'));   
    }
}
