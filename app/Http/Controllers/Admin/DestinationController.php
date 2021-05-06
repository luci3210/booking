<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Model\Admin\DestinationModel;
use App\Model\Admin\LocationDistrictModel;
use App\Model\Admin\TempStatusModel;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DestinationController extends Controller
{
    public function __construct()	{

        $this->middleware('auth:admin');
    }

    public function locationdistrict() {

    	return LocationDistrictModel::where('temp_status',1)->get();
    }

    public function temp() {

    	return TempStatusModel::all();
    }

    public function destination_form() { 
    	
    	$location = $this->locationdistrict();
    	$status = $this->temp();

    	return view('admin.destination.add_form',compact('location','status'));
    }
    
    public function destination_submit_form(Request $request) {

    	$validate = [
            	'destination' 	=> 'required',
            	'info' 			=> 'required',
            	'desc' 			=> 'required',
            	'ts'		 	=> 'required',
            	// 'file'		=> 'required|mimes:jpeg,png,jpg|max:21048',
        ];

        // $imageName = time().'.';  
        $file = $request->file('file');
	    $new_image_name = 'DESTI'.date('Ymd').uniqid().'.jpg';
        $file->move(public_path('image/destination'), $new_image_name);


        $errMessage = ['required' => '* Enter your :attribute'];
        $this->validate($request, $validate, $errMessage);   

        DestinationModel::create([
        	'destination_id' 	=> $request->destination,
        	'destination_info' 	=> $request->info,
        	'destination_desc' 	=> $request->desc,
        	'destination_image' => $new_image_name,
        	'temp_status' 		=> $request->ts
        ]);
        return back()->withSuccess('Successfully added!');
    }

    public function destination_list() {

    	
    }
}
