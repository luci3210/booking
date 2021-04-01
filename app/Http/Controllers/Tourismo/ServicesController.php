<?php

namespace App\Http\Controllers\Tourismo;

use App\Model\Admin\ProductModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
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
