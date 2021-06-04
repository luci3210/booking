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
use App\Model\Merchant\MerchantAddress;
use App\Model\Merchant\Profile;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AddressController extends Controller
{

     public function __construct()
         {
            $this->middleware('auth:web');
         }   
         
    public function addressCreateForm() {

        $address = $this->getAddress();
        $country = $this->country();
        return view('merchant.address.address_form',compact([
            'product','room_facilities','building_facilities','packages','country','address','profile_photo']));
    }

    public function getAddress() {

        return Profile::join('merchant_address','merchant_address.prof_id','=','profiles.id')
                    ->where('merchant_address.temp_status','=','1')
                    ->where('profiles.user_id','=',Auth::user()->id)
                        ->get(['profiles.*','merchant_address.*']);
    }

    public function addressSubmitForm(Request $request) {

        $input_validate = ['address' => 'required|max:500',
        'country' => 'required|numeric',
        'region' => 'required|numeric',
        'district' => 'required|numeric',
        'city' => 'required|numeric',
        'municipality' => 'required|numeric',
        'barangay' => 'required|numeric',
        'prof_id' => 'required|numeric'];

        $errMessage = ['required' => '* Enter your :attribute','numeric'=>'invalid value :attribute'];

        $this->validate($request, $input_validate, $errMessage);   

        MerchantAddress::create(['address' => $request->address,
        'country_id' => $request->country,
        'region_id' => $request->region,
        'district_id' => $request->district,
        'city_id' => $request->city,
        'municipality_id' => $request->municipality,
        'barangay_id' => $request->barangay,
        'temp_status' => 1,
        'prof_id' => $request->prof_id]);
        return redirect('merchant')->withSuccess('Successfully updated!');
    }

    public function addressDelete(Request $request, $id)
    {
        $mAddress = MerchantAddress::find($id);
        // $mAddress->temp_status()->attach($id);
        $mAddress->update(['temp_status'=> 4]);
        return redirect()->back()->withSuccess('Successfully deleted!');   
        // return redirect('admin/tourismo/ph/page/1/product')->withSuccess('Successfully deleted!');
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
