<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Admin\AdminLogModel;

use App\Model\Admin\PlanModel;
use App\Model\Admin\ProductModel;
use App\Model\Admin\PlanpackageModel;
use App\Model\Admin\RoomFaciliModel;
use App\Model\Admin\BuildingFaciliModel;
use App\Model\Admin\PackageincluModel;


class InclusionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($id)
    {
    	$product = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
                ->where('products.id','=',$id)->where('temp_status.status','=','active')
                ->get(['products.id as productid','products.name','temp_status.id','temp_status.status'])->first();
                
        if(empty($product->productid)) { 
			abort(404, 'Not Found.');
	     }
        if($product->productid == '10016') { //hotel

        	$roomfacilities = RoomFaciliModel::join('temp_status','temp_status.id','=','room_facilities.temp_status')
            ->where('temp_status.status','=','active')
            ->select(['room_facilities.*','temp_status.status'])->orderBy('room_facilities.id', 'desc')->paginate(30);

            $buildingfacilities = BuildingFaciliModel::join('temp_status','temp_status.id','=','building_dacilities.temp_status')
            ->where('temp_status.status','=','active')
            ->select(['building_dacilities.*','temp_status.status'])->orderBy('building_dacilities.id', 'desc')->paginate(30);

            $package = PackageincluModel::join('temp_status','temp_status.id','=','package_inclusion.temp_status')
            ->where('temp_status.status','=','active')
            ->select(['package_inclusion.*','temp_status.status'])->orderBy('package_inclusion.id', 'desc')->paginate(30);

        	return view('admin.inclusion.inclusionindex',compact(['roomfacilities','product','buildingfacilities','package']));

        }
        if($product->productid == '10011') { //tour packages
        	return view('admin.inclusion.inclusionindex',compact('product'));
        }
        if($product->productid == '10017') { //language translator
        	return view('admin.inclusion.inclusionindex',compact('product'));
        }
        if($product->productid == '10018') { // flight
        	return view('admin.inclusion.inclusionindex',compact('product'));
        }
        if($product->productid == '10019') { //cruise
        	return view('admin.inclusion.inclusionindex',compact('product'));
        }
        
    }

    public function roomfacilities_save(Request $request)
    {
    	$rules = [
            'facilities' => 'required',
            'status' => 'required'
        ];

        $errMessage = ['required' => '* Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);   

        RoomFaciliModel::create(['name' => $request->facilities,'temp_status' => $request->status]);

        return back()->withSuccess('Successfully added!');
    }

    public function buildingfacilities_save(Request $request)
    {
    	$rules = [
            'facilities' => 'required',
            'status' => 'required'
        ];

        $errMessage = ['required' => '* Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);   

        BuildingFaciliModel::create(['name' => $request->facilities,'temp_status' => $request->status]);

        return back()->withSuccess('Successfully added!');
    }
    public function package_save(Request $request)
    {
    	$rules = [
            'facilities' => 'required',
            'status' => 'required'
        ];

        $errMessage = ['required' => '* Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);   

        PackageincluModel::create(['name' => $request->facilities,'temp_status' => $request->status]);

        return back()->withSuccess('Successfully added!');
    }
    // public function roomfacilities_edit($id, $idt)
    // {
    // 	$product = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
    //             ->where('products.id','=',$id)->where('temp_status.status','=','active')
    //             ->get(['products.id as productid','products.name','temp_status.id','temp_status.status'])->first();

    //     $roomfacilities = RoomFaciliModel::join('temp_status','temp_status.id','=','room_facilities.temp_status')
    //         ->where('temp_status.status','=','active')
    //         ->select(['room_facilities.*','temp_status.status'])->orderBy('room_facilities.id', 'desc')->paginate(10);

    // 	$roomfacilities_edit = RoomFaciliModel::join('temp_status','temp_status.id','=','room_facilities.temp_status')
    //         ->where('room_facilities.id','=',$idt)
    //         ->get(['room_facilities.*','temp_status.id','temp_status.status'])->first();

    // 	// $plan = RoomFaciliModel::join('temp_status','temp_status.id','=','plans.temp_status')
    //  	//            ->join('admins','admins.id','=','plans.user_id')
    //  	//            ->where('plans.id','=', $id)->get(['plans.*','temp_status.status'])->first();
                
    //     return view('admin.inclusion.inclusionindexs',compact(['roomfacilities','product','roomfacilities_edit']));
    // }
    
}
