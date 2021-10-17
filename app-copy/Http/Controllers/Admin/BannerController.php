<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\BannerModel;

use App\Model\Admin\TempStatusModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    public function __construct()	{

        $this->middleware('auth:admin');
    }

    public function temp() {

    	return TempStatusModel::all();
    }

    public function banner_form() { 
    	
    	$status = $this->temp();

    	return view('admin.banner.add_form',compact('status'));
    }
    
    public function banner_submit_form(Request $request) {

    	$validate = [
            	'short_desc' 			   => 'required',
                'long_desc'             => 'required',
            	'location' 			=> 'required',
            	'ts'		 	=> 'required',
            	// 'file'		=> 'required|mimes:jpeg,png,jpg|max:21048',
        ];

        $file = $request->file('file');
	    $new_image_name = 'BANNER'.date('Ymd').uniqid().'.jpg';
        $file->move(public_path('image/banner'), $new_image_name);


        $errMessage = ['required' => '* Enter your :attribute'];
        $this->validate($request, $validate, $errMessage);   

        BannerModel::create([
        	'short_des' 	=> $request->short_desc,
        	'long_desc' 	=> $request->long_desc,
            'banner_img'   => $new_image_name,
        	'location'   => $request->location,
        	'temp_status' 		=> $request->ts
        ]);
        return back()->withSuccess('Successfully added!');
    }
}
