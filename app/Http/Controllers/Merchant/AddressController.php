<?php

use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Model\Admin\LocationCountyModel;
use App\Model\Admin\LocationRegionModel;
use App\Model\Admin\LocationDistrictModel;
use App\Model\Admin\LocationCityModel;
use App\Model\Admin\LocationMunicipalityModel;
use App\Model\Admin\LocationBarangayModel;

use Illuminate\Http\Request;

class AddressController extends Controller
{

     public function __construct()
         {
            $this->middleware('auth:web');
         }   
         
    public function addressCreateForm() {

        $country                = $this->country();
        return view('merchant.address.address_form',compact([
            'product','room_facilities','building_facilities','packages','country','address','profile_photo']));
    }

    public function getAddress() {

        return Profile::join('merchant_address','merchant_address.prof_id','=','profiles.id')
                    ->where('merchant_address.temp_status','=','1')
                    ->where('profiles.user_id','=',Auth::user()->id)
                        ->get(['profiles.*','merchant_address.*']);
    }

    public function profile_address_save(Request $request) {

         $rules = [
            'address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required'
        ];

        $errMessage = ['required' => '* Enter your :attribute'];

        $this->validate($request, $rules, $errMessage);   

        MerchantAddress::create(['address' => $request->address,
                        'longt' => $request->longitude,
                        'latt' => $request->latitude,
                        'temp_status' => 1,
                        'prof_id' => $request->prof_id]);
        return redirect('merchant')->withSuccess('Successfully updated!');
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

}
