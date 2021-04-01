<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Admin\AdminLogModel;
use App\Model\Admin\LocationCountyModel;

use App\Model\Admin\LocationModel; 
// use App\Model\Admin\PlanModel;
// use App\Model\Admin\ProductModel;
// use App\Model\Admin\PlanpackageModel;
// use App\Model\Admin\RoomFaciliModel;
// use App\Model\Admin\BuildingFaciliModel;
// use App\Model\Admin\PackageincluModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LocationController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store_country_state(Request $request, $id)
    {
        $rules = [
            'country' => 'required',
            'status' => 'required'
        ];

        $errMessage = ['required' => '* Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);   

        LocationCountyModel::updateOrInsert(['location_id' => $id,'country' => $request->country,'temp_status' => $request->status]);
        return back()->withSuccess('Successfully added!');
    }

    public function index($id)
    {
    	$locations = LocationModel::join('temp_status','temp_status.id','=','locations.temp_status')->where('locations.id',$id)->where('temp_status.status','active')->get(['locations.id as locid','locations.name as names','temp_status.id','temp_status.status'])->first();


        if(empty($locations)) { 
            abort(404, 'Not Found.');
         } 
        if($locations->locid == true)
         {
            $getcountry = LocationModel::join('location_country as country','country.location_id','locations.id')
                ->join('locations_region','locations_region.country_id','=','country.id')
                ->join('temp_status as ts','ts.id','=','country.temp_status')
                // ->where('country.location_id','locations.id')
                ->where('ts.status','active')
                // ->whereNotNull('country.location_id')
                // ->orWhere('country.id','locations_region.country_id')
                
                ->select([
                        'locations.*',
                        'country.*',
                        'locations_region.*',
                        'ts.*'])->groupBy('locations_region.country_id')
                            ->orderBy('country.country','asc')->paginate(30);

            return view('admin.location.index',compact(['locations','getcountry']));
         }

        // if($product->productid == '10016') { //hotel

        // 	$roomfacilities = RoomFaciliModel::join('temp_status','temp_status.id','=','room_facilities.temp_status')
        //     ->where('temp_status.status','=','active')
        //     ->select(['room_facilities.*','temp_status.status'])->orderBy('room_facilities.id', 'desc')->paginate(30);

        //     $buildingfacilities = BuildingFaciliModel::join('temp_status','temp_status.id','=','building_dacilities.temp_status')
        //     ->where('temp_status.status','=','active')
        //     ->select(['building_dacilities.*','temp_status.status'])->orderBy('building_dacilities.id', 'desc')->paginate(30);

        //     $package = PackageincluModel::join('temp_status','temp_status.id','=','package_inclusion.temp_status')
        //     ->where('temp_status.status','=','active')
        //     ->select(['package_inclusion.*','temp_status.status'])->orderBy('package_inclusion.id', 'desc')->paginate(30);

        // 	return view('admin.inclusion.inclusionindex',compact(['roomfacilities','product','buildingfacilities','package']));

        // }
        // if($product->productid == '10011') { //tour packages
        // 	return view('admin.inclusion.inclusionindex',compact('product'));
        // }
        // if($product->productid == '10017') { //language translator
        // 	return view('admin.inclusion.inclusionindex',compact('product'));
        // }
        // if($product->productid == '10018') { // flight
        // 	return view('admin.inclusion.inclusionindex',compact('product'));
        // }
        // if($product->productid == '10019') { //cruise
        // 	return view('admin.inclusion.inclusionindex',compact('product'));
        // }
        
    }

    // public function roomfacilities_save(Request $request)
    // {
    // 	$rules = [
    //         'facilities' => 'required',
    //         'status' => 'required'
    //     ];

    //     $errMessage = ['required' => '* Enter your :attribute'];

    //     $this->validate($request, $rules, $errMessage);   

    //     RoomFaciliModel::create(['name' => $request->facilities,'temp_status' => $request->status]);

    //     return back()->withSuccess('Successfully added!');
    // }

    // public function buildingfacilities_save(Request $request)
    // {
    // 	$rules = [
    //         'facilities' => 'required',
    //         'status' => 'required'
    //     ];

    //     $errMessage = ['required' => '* Enter your :attribute'];

    //     $this->validate($request, $rules, $errMessage);   

    //     BuildingFaciliModel::create(['name' => $request->facilities,'temp_status' => $request->status]);

    //     return back()->withSuccess('Successfully added!');
    // }
    // public function package_save(Request $request)
    // {
    // 	$rules = [
    //         'facilities' => 'required',
    //         'status' => 'required'
    //     ];

    //     $errMessage = ['required' => '* Enter your :attribute'];

    //     $this->validate($request, $rules, $errMessage);   

    //     PackageincluModel::create(['name' => $request->facilities,'temp_status' => $request->status]);

    //     return back()->withSuccess('Successfully added!');
    // }
    // // public function roomfacilities_edit($id, $idt)
    // // {
    // // 	$product = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
    // //             ->where('products.id','=',$id)->where('temp_status.status','=','active')
    // //             ->get(['products.id as productid','products.name','temp_status.id','temp_status.status'])->first();

    // //     $roomfacilities = RoomFaciliModel::join('temp_status','temp_status.id','=','room_facilities.temp_status')
    // //         ->where('temp_status.status','=','active')
    // //         ->select(['room_facilities.*','temp_status.status'])->orderBy('room_facilities.id', 'desc')->paginate(10);

    // // 	$roomfacilities_edit = RoomFaciliModel::join('temp_status','temp_status.id','=','room_facilities.temp_status')
    // //         ->where('room_facilities.id','=',$idt)
    // //         ->get(['room_facilities.*','temp_status.id','temp_status.status'])->first();

    // // 	// $plan = RoomFaciliModel::join('temp_status','temp_status.id','=','plans.temp_status')
    // //  	//            ->join('admins','admins.id','=','plans.user_id')
    // //  	//            ->where('plans.id','=', $id)->get(['plans.*','temp_status.status'])->first();
                
    // //     return view('admin.inclusion.inclusionindexs',compact(['roomfacilities','product','roomfacilities_edit']));
    // // }
    
}
