<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ProductModel;
use App\Model\Admin\AdminLogModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$products = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
                ->join('admins','admins.id','=','products.user_id')
                ->where('products.temp_status','!=', 4)->orWhereNull('products.temp_status')->select(['products.*','temp_status.status','admins.name as adminname'])->orderBy('id', 'desc')->paginate(10);

    	if (session('success_message')) {
    		Alert::success('Success!', session('success_message'));
    	}

    	return view('admin.product.index',['products' => $products])->with('i',(request()->input('page', 1) -1) *10);
        
    }

    public function create()
    {
    	return view('admin.product.form');
    }
    
    public function store(Request $request)
    {
    	 $rules = [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_status' => 'required',
        ];

        $errMessage = ['required' => '* Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);                   

        ProductModel::create(['name' => $request->product_name,
                                'description' => $request->product_description,
                                    'temp_status' => $request->product_status,
                                        'user_id' => Auth::user()->id]);

        return redirect('admin/tourismo/ph/page/1/product')->withSuccess('Successfully added!');
    }

    public function edit($id)
    {
    	$product = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
                ->join('admins','admins.id','=','products.user_id')
                ->where('products.id','=', $id)->get(['products.*','temp_status.status','admins.name as adminname'])->first();

        return view('admin.product.form_edit',compact('product'));
    } 

    public function update(Request $request, $id)
    {
    	$rules = [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_status' => 'required',
        ];

        $errMessage = ['required' => 'Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);

        $listings = ProductModel::find($id);
        $listings->update(['name'=>$request->product_name, 'description'=>$request->product_description,'temp_status'=>$request->product_status,'user_id'=>Auth::user()->id]);

        AdminLogModel::create(['user_id'=>Auth::user()->id,'page_id'=>$id,'action'=>"edit",'page_name'=>"product"]);

    	return redirect('admin/tourismo/ph/page/1/product')->withSuccess('Successfully updated!');
    }

    public function delete(Request $request, $id)
    {
   
        $listings = ProductModel::find($id);
        $listings->update(['temp_status'=> 4]);

        AdminLogModel::create(['user_id'=>Auth::user()->id,'page_id'=>$id,'action'=>"delete"]);

    	return redirect('admin/tourismo/ph/page/1/product')->withSuccess('Successfully deleted!');
    }
}
