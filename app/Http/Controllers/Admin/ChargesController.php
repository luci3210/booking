<?php

namespace App\Http\Controllers\Admin;

#controller
use App\Http\Controllers\Controller;

#model
use App\Model\Admin\ProductModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ChargesController extends Controller
{
    public function __construct() {

        $this->middleware('auth:admin');
    }

    protected function call_description() {

        return $call_query = ProductModel::where( function($query) {
            $query->from('products')->whereIn('products.temp_status',[1,2,3]);  
                })->get();
    
    }

    public function index() {

        $products = $this->call_description();

        return view('admin.charge.index',compact('products'));
    }
}
