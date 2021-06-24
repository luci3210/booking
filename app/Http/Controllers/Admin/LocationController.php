<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Admin\AdminLogModel;
use App\Model\Admin\LocationCountyModel;
use App\Model\Admin\LocationRegionModel;
use App\Model\Admin\LocationDistrictModel;
use App\Model\Admin\LocationCityModel;
use App\Model\Admin\LocationMunicipalityModel;
use App\Model\Admin\LocationBarangayModel;
// use App\Model\Admin\LocationRegionModel;
use App\Model\Admin\LocationModel; 
// use App\Model\Admin\PlanModel;
// use App\Model\Admin\ProductModel;
// use App\Model\Admin\PlanpackageModel;
// use App\Model\Admin\RoomFaciliModel;
// use App\Model\Admin\BuildingFaciliModel;
// use App\Model\Admin\PackageincluModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Builder;

class LocationController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function get_country_search($id)
    {
        $locations = LocationModel::where('locations.id',$id)->orWhere('temp_status',1)->get();

        $search = $_GET['search'];
        $getcountry = LocationCountyModel::where('country','LIKE','%'.$search.'%')->get();

        return view('admin.location.search.country',compact(['locations','getcountry']));
    }
    public function get_region_search($id)
    {
        $get_country = $this->get_country(); 
        $locations = LocationModel::join('temp_status','temp_status.id','=','locations.temp_status')->where('locations.id',$id)->where('temp_status.status','active')->get(['locations.id as locid','locations.name as names','temp_status.id','temp_status.status'])->first();

        $search = $_GET['search'];
        $in_region_and_country = LocationRegionModel::join('location_country','location_country.id','locations_region.country_id')->where('locations_region.region','LIKE','%'.$search.'%')->where('location_country.temp_status',1)->where('location_country.temp_status',1)->orderBy('locations_region.region','asc')->select('locations_region.region','locations_region.location_id as region_location_id','location_country.country')->get();

        return view('admin.location.search.region',compact(['locations','in_region_and_country','get_country']));
    }

    public function find_district_for_destination($id)
    {
        return json_encode(LocationDistrictModel::select()->where('country_id',$id)->get());
    }    

    public function find_region_id($id)
    {
        return json_encode(LocationRegionModel::select()->where('country_id',$id)->get());
    }
    public function find_district_id($id)
    {
        return json_encode(LocationDistrictModel::select()->where('country_id',$id)->get());
    }
    public function find_city_id($id)
    {
        return json_encode(LocationCityModel::select()->where('district_id',$id)->get());
    }
    public function find_municipality_id($id)
    {
        return json_encode(LocationMunicipalityModel::select()->where('city_id',$id)->get());   
    }

    public function get_location_id()
    {
        return LocationModel::where('temp_status',1)->get();
    }

    public function get_country()
    {
        return LocationCountyModel::where('temp_status',1)->orderBy('country')->get();
    }

    public function in_region_and_country()
    {
        return LocationRegionModel::join('location_country','locations_region.country_id','location_country.id')->where('location_country.temp_status',1)->where('location_country.temp_status',1)->orderBy('locations_region.region','asc')
            ->select('locations_region.region','locations_region.location_id as region_location_id','location_country.country')->paginate(15);
    }
    public function in_distric_region_and_country()
    {
        return LocationDistrictModel::join('locations_region','locations_region.id','locations_district.region_id')
            ->join('location_country','locations_region.country_id','location_country.id')
            ->where('locations_district.temp_status',1)
            ->Where('locations_region.temp_status',1)
            ->Where('location_country.temp_status',1)
            ->orderBy('locations_district.district','asc')
            ->select('locations_district.id as district_id','locations_district.district','locations_region.region','locations_region.location_id as region_location_id','location_country.country')->paginate(15);
    }
    public function in_city_distric_region_and_country()
    {
        return LocationCityModel::join('locations_district','locations_district.id','locations_city.district_id')
            ->join('locations_region','locations_region.id','locations_district.region_id')
            ->join('location_country','locations_region.country_id','location_country.id')
            ->where('locations_district.temp_status',1)
            ->Where('locations_region.temp_status',1)
            ->Where('location_country.temp_status',1)
            ->orderBy('locations_district.district','asc')
            ->select('locations_city.id as cityid','locations_city.city','locations_district.id as district_id','locations_district.district','locations_region.region','locations_region.location_id as region_location_id','location_country.country')->paginate(15);
    }
    public function in_municipality_city_distric_region_and_country()
    {
        return LocationMunicipalityModel::join('locations_city','locations_city.id','locations_municipalities.city_id')
            ->join('locations_district','locations_district.id','locations_city.district_id')
            ->join('locations_region','locations_region.id','locations_district.region_id')
            ->join('location_country','locations_region.country_id','location_country.id')
            ->where('locations_district.temp_status',1)
            ->Where('locations_region.temp_status',1)
            ->Where('location_country.temp_status',1)
            ->orderBy('locations_district.district','asc')
            ->select('locations_municipalities.id','locations_municipalities.municipality','locations_city.id as cityid','locations_city.city','locations_district.id as district_id','locations_district.district','locations_region.region','locations_region.location_id as region_location_id','location_country.country')->paginate(15);
    }

    public function in_barangay_municipality_city_distric_region_and_country()
    {
        return LocationBarangayModel::join('locations_municipalities','locations_municipalities.id','locations_barangay.municipality_id')
            ->join('locations_city','locations_city.id','locations_municipalities.city_id')
            ->join('locations_district','locations_district.id','locations_city.district_id')
            ->join('locations_region','locations_region.id','locations_district.region_id')
            ->join('location_country','locations_region.country_id','location_country.id')
            ->where('locations_district.temp_status',1)
            ->Where('locations_region.temp_status',1)
            ->Where('location_country.temp_status',1)
            ->orderBy('locations_district.district','asc')
            ->select('locations_barangay.barangay','locations_municipalities.id','locations_municipalities.municipality','locations_city.id as cityid','locations_city.city','locations_district.id as district_id','locations_district.district','locations_region.region','locations_region.location_id as region_location_id','location_country.country')->paginate(15);
    }

    public function get_location_country()
    {
        return $getcountry = LocationModel::join('location_country as country','country.location_id','locations.id')
            ->join('temp_status as ts','ts.id','country.temp_status')
            ->where('ts.status','active')
            ->select(['locations.*','country.*','ts.*'])->orderBy('country.country')->paginate(10);
    }
    public function index($id)
    {
    	    $locations = LocationModel::join('temp_status','temp_status.id','=','locations.temp_status')->where('locations.id',$id)->where('temp_status.status','active')->get(['locations.id as locid','locations.name as names','temp_status.id','temp_status.status'])->first();

            $get_location_id                = $this->get_location_id();
            $get_country                    = $this->get_country(); 
            $in_region_and_country          = $this->in_region_and_country();
            $in_distric_region_and_country  = $this->in_distric_region_and_country();
            $in_city                        = $this->in_city_distric_region_and_country();
            $in_municipality                = $this->in_municipality_city_distric_region_and_country();
            $in_barangay                    = $this->in_barangay_municipality_city_distric_region_and_country();
            $getcountry                     = $this->get_location_country();


            switch ($locations->locid) {
                case '1':
                    return view('admin.location.index',compact(['locations','getcountry','get_location_id']));
                        break;

                case '2':
                    return view('admin.location.region',compact(
                        ['locations',
                            'get_location_id',
                                'get_country',
                                    'in_region_and_country']));
                        break;

                case '3':
                    return view('admin.location.district',compact(
                        ['locations',
                            'get_location_id',
                                'get_country',
                                    'in_distric_region_and_country']));
                        break;

                case '4':
                    return view('admin.location.city',compact(
                        ['locations',
                            'get_location_id',
                                'get_country',
                                    'in_city']));
                        break;

                case '5':
                    return view('admin.location.municipality',compact(
                        ['locations',
                            'get_location_id',
                                'get_country',
                                    'in_municipality']));
                        break;

                case '6':
                    return view('admin.location.barangay',compact(
                        ['locations',
                            'get_location_id',
                                'get_country',
                                    'in_barangay']));
                        break;

                default:
                     abort(404, '404 Error - the requested page does not exist.');
                    break;
            }
    }
    public function store_country_state(Request $request, $id)
    {
        $rules = ['country' => 'required',
                    'status' => 'required'];
        
        $errMessage = ['required' => '* Enter your :attribute'];
        $this->validate($request, $rules, $errMessage);   

        LocationCountyModel::updateOrInsert(['location_id' => 1,'country' => $request->country,'temp_status' => $request->status]);
        return back()->withSuccess('Successfully added!');
    }

    public function store_region(Request $request, $id)
    {
        $rules = ['country' => 'required',
                    'region' => 'required',
                        'status' => 'required'];

        $errMessage = ['required' => '* Enter your :attribute'];
        $this->validate($request, $rules, $errMessage);   

        LocationRegionModel::updateOrInsert(['location_id' => 2,'country_id' => $request->country,'region' => $request->region,'temp_status' => $request->status]);
        return back()->withSuccess('Successfully added!');
    }

    public function store_district(Request $request, $id)
    {
        $rules = ['country' => 'required',
                    'region' => 'required', 
                        'district' => 'required',
                            'status' => 'required'];

        $errMessage = ['required' => '* Enter your :attribute'];
        $this->validate($request, $rules, $errMessage);   

        LocationDistrictModel::updateOrInsert(
            ['location_id' => 3,
                'country_id' => $request->country,
                    'region_id' => $request->region,
                        'district' => $request->district,
                            'temp_status' => $request->status]);
        return back()->withSuccess('Successfully added!');
    }

    public function store_city(Request $request, $id)
    {
        $rules = ['country' => 'required',
                    'region' => 'required', 
                        'district' => 'required',
                            'city' => 'required',
                                'status' => 'required'];

        $errMessage = ['required' => '* Enter your :attribute'];
        $this->validate($request, $rules, $errMessage);   

        LocationCityModel::updateOrInsert(
            ['location_id' => 4,
                'country_id' => $request->country,
                    'region_id' => $request->region,
                        'district_id' => $request->district,
                            'city' => $request->city,
                                'temp_status' => $request->status]);
        return back()->withSuccess('Successfully added!');
    }

    public function store_municipality(Request $request, $id)
    {
        $rules = ['country' => 'required',
                    'region' => 'required', 
                        'district' => 'required',
                            'city' => 'required',
                                'municipality' => 'required',
                                    'status' => 'required'];

        $errMessage = ['required' => '* Enter your :attribute'];
        $this->validate($request, $rules, $errMessage);   

        LocationMunicipalityModel::updateOrInsert(
            ['location_id' => 5,
                'country_id' => $request->country,
                    'region_id' => $request->region,
                        'district_id' => $request->district,
                            'city_id' => $request->city,
                                'municipality' => $request->municipality,
                                    'temp_status' => $request->status]);
        return back()->withSuccess('Successfully added!');
    }

    public function store_barangay(Request $request, $id)
    {
        $rules = ['country' => 'required',
                    'region' => 'required', 
                        'district' => 'required',
                            'city' => 'required',
                                'municipality' => 'required',
                                    'barangay' => 'required',
                                        'status' => 'required'];

        $errMessage = ['required' => '* Enter your :attribute'];
        $this->validate($request, $rules, $errMessage);   

        LocationBarangayModel::updateOrInsert(
            ['location_id' => 6,
                'country_id' => $request->country,
                    'region_id' => $request->region,
                        'district_id' => $request->district,
                            'city_id' => $request->city,
                                'municipality_id' => $request->municipality,
                                    'barangay' => $request->barangay,
                                        'temp_status' => $request->status]);
        return back()->withSuccess('Successfully added!');
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
