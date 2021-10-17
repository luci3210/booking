<?php

namespace App\Http\Controllers\Admin;

#controller
use App\Http\Controllers\Controller;

#model
use App\Model\Admin\ProductModel;
use App\Model\ChargesModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ChargesController extends Controller
{
    public function __construct() {

        $this->middleware('auth:admin');
    }

    protected function call_description() {

        return $call_query = ChargesModel::join('products','products.id','charges.chrg_product_id')
            ->join('temp_status','temp_status.id','products.temp_status')
            ->where( function($query) {
            $query->from('products')->whereIn('products.temp_status',[1,2,3,4,5]);  
                })->get();
    
    }

    public function index() {

        $products = $this->call_description();

        return view('admin.charge.index',compact('products'));
    }

    public function get_charges($id) {

        $products = ChargesModel::join('products','products.id','charges.chrg_product_id')->find($id);
        
        return response()->json(['data' => $products]);

    }

    public function edit(Request $request)  {

        $address_delete = ChargesModel::where('chrg_id',$request->charge_id)->update(['chrg_value'=> $request->charge_value]);
    
        return redirect()->back()->withSuccess('Successfully Updated!');

    }
}
