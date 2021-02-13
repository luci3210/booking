<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Admin\ProductModel;

class ProductController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$products = ProductModel::all();
    	return view('admin.product.index',['products' => $products]);
    }

    public function store(Request $request)
    {

    }
}
