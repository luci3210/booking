<?php

namespace App\Http\Controllers\Merchant;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Model\Admin\ProductModel;
use App\Model\Admin\RoomFaciliModel;
use App\Model\Admin\BuildingFaciliModel;
use App\Model\Admin\PackageincluModel;
use App\Model\Admin\LocationCountyModel;
use App\Model\Admin\LocationRegionModel;
use App\Model\Admin\LocationDistrictModel;
use App\Model\Admin\LocationCityModel;
use App\Model\Admin\LocationMunicipalityModel;
use App\Model\Admin\LocationBarangayModel;

use App\Model\Merchant\HotelPhoMoldel;
use App\Model\Merchant\Profile;
use App\Model\Merchant\HotelModel;
use App\Model\Merchant\MerchantAddress;

class ServiceController extends Controller
{
public function __construct() {

    	$this->middleware('auth:web');	
    }

public function room_facilities() {

    return RoomFaciliModel::join('temp_status','temp_status.id', 'room_facilities.temp_status')->where('temp_status.status', 'active')
            ->orderBy('room_facilities.name')->distinct()->get();
}

public function building_facilities() {

    return BuildingFaciliModel::join('temp_status','temp_status.id', 'building_dacilities.temp_status')
           ->where('temp_status.status', 'active')->orderBy('building_dacilities.name')->distinct()->get();
}

public function packages() {

    return PackageincluModel::join('temp_status','temp_status.id', 'package_inclusion.temp_status')->where('temp_status.status', 'active')
            ->orderBy('package_inclusion.name')->distinct()->get();
}

public function address() {

    return Profile::join('merchant_address','merchant_address.prof_id','=','profiles.id')
                ->join('myplans','myplans.id', 'profiles.plan_id')
                ->where('merchant_address.temp_status','=','1')
                ->where('myplans.user_id','=',Auth::user()->id)->get(['merchant_address.*']);
}
public function country() {

    return LocationCountyModel::where('temp_status',1)->orderBy('country')->get();
    }

public function find_region_id($id)
{
    return json_encode(LocationRegionModel::select()->where('country_id',$id)->get());
}
public function find_district_id($id)
{
    return json_encode(LocationDistrictModel::select()->where('region_id',$id)->get());
}
public function find_city_id($id)
{
    return json_encode(LocationCityModel::select()->where('district_id',$id)->get());
}
public function find_municipality_id($id)
{
    return json_encode(LocationMunicipalityModel::select()->where('city_id',$id)->get());   
}
public function find_barangay_id($id)
{
    return json_encode(LocationBarangayModel::select()->where('municipality_id',$id)->get());   
}


public function index($id) {

    $room_facilities        = $this->room_facilities();
    $building_facilities    = $this->building_facilities();
    $packages               = $this->packages();

    $address                = $this->address();
    $country                = $this->country();

    $profpic = Profile::join('users','users.id','=','profiles.user_id')
    	->where('users.id','=',Auth::user()->id)->get(['users.*','profiles.*']);

    	$product = ProductModel::join('temp_status','temp_status.id','=','products.temp_status')
    		->where('products.id','=',$id)
    		->where('temp_status.status','=','active')->get(['products.id as productid','products.name','products.temp_status','temp_status.id','temp_status.status'])->first();

    	return view('merchant.services.index',compact([
            'profpic','product','room_facilities','building_facilities','packages','country','address']));
    }
public function savehotel(Request $request)
    {
    	 $rules = [
            'price' => 'required',
            'numnight' => 'required',
            'roomname' => 'required',
            'roomsize' => 'required',
            'roomdesc' => 'required',
            'viewdeck' => 'required',
            'numguest' => 'required',
            'numbed' => 'required'];


        $errMessage = ['required' => '* Enter your :attribute'];

   		$this->validate($request, $rules, $errMessage);   

        HotelModel::updateOrInsert(['price' => $request->price,
            'nonight' => $request->numnight,
            'roomname' => $request->roomname,
            'roomsize' => $request->roomsize,
            'roomdesc' => $request->roomdesc,
            'viewdeck' => $request->viewdeck,
            'noguest' => $request->numguest,
            'nobed' => $request->numbed,
          	'profid' => Auth::user()->id,
            'room_facilities' => implode(',', $request->room),  
            'building_facilities' => implode(',', $request->building),
            'booking_package'  => implode(',', $request->package),
            'country'  => $request->country,
            'region'  => $request->region,
            'district'  => $request->district,
            'city'  => $request->city,
            'municipality'  => $request->municipality,
            'barangay'  => $request->barangay,
            'address_id'  => $request->address,
            'created_at' =>  \Carbon\Carbon::now(),
          ]);

return redirect()->route('service', ['id' => 10016])->withSuccess('Successfully added!');
    }

public function get_cover_id()
{
   $getid =  HotelModel::where('profid',Auth::user()->id)->limit(1)->orderBy('id','desc')->get();
   $phtoid = $getid[0]->id +1;

   for ($x = 1; $x <= $phtoid; $x++) 
    {
        $valid = ($phtoid-$phtoid)+$phtoid;
    }
    return $valid;
}
public function upload_cover(Request $request)
    {
        $imageName = $request->file('file');
        $new_image_name = 'MER'.date('Ymd').uniqid().'.jpg';
 
        $count_id = $this->get_cover_id();
       
        request()->file->move(public_path('upload/merchant/coverphoto'), $new_image_name);

        HotelPhoMoldel::create(['merchant_id' => 1, 'upload_id' => $count_id, 'photo' => $new_image_name]); 

        return response()->json(['uploaded' => '/upload/merchant/coverphoto'.$new_image_name]);
    }


}
