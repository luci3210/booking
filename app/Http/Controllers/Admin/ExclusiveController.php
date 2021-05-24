<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\ExclusiveModel;

use App\Model\Admin\LocationDistrictModel;
use App\Model\Admin\LocationCountyModel;

use App\Model\Admin\TempStatusModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExclusiveController extends Controller
{
    public function __construct()	{

        $this->middleware('auth:admin');
    }

    public function temp() {

    	return TempStatusModel::all();
    }

    public function update_form() { 
    	
    	$status = $this->temp();

    	return view('admin.exclusive.update_form',compact('country','destrict','status'));
    }
    
    public function exclusive_update_submit(Request $request) {

    	$validate = [
            	'short_desc' 			=> 'required',
            	'long_desc' 			=> 'required',
            	'ts'		 	=> 'required',
            	// 'file'		=> 'required|mimes:jpeg,png,jpg|max:21048',
        ];

        $file = $request->file('file');
	    $new_image_name = 'EXCLU'.date('Ymd').uniqid().'.jpg';
        $file->move(public_path('image/exclusive'), $new_image_name);


        $errMessage = ['required' => '* Enter your :attribute'];
        $this->validate($request, $validate, $errMessage);   

        ExclusiveModel::create([
        	'exclusive_info' 	=> $request->short_desc,
        	'exclusive_desc' 	=> $request->long_desc,
        	'exclusive_image'   => $new_image_name,
        	'temp_status' 		=> $request->ts
        ]);
        return back()->withSuccess('Successfully added!');

    }
}
