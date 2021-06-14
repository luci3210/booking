<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Merchant\ProfileController;

use App\Model\Merchant\MerchantAddress;
use App\Model\Merchant\MerchantCountyModel;

use App\Http\Requests\MerchantPostCreateRequest;
use App\Http\Requests\MerchantUpdateAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileAddressController extends Controller
{
    
    private $profile;

    public function __construct(ProfileController $profile) {

        $this->middleware('auth:web');

        $this->profile = $profile;
    }

    public function country() {

    return MerchantCountyModel::where('temp_status',1)->orderBy('country')->get();
    }

    public function address_form() {

        $country = $this->country();

        return view('merchant_dashboard.profile.profile_address',compact(['country']));
    }

    public function address_create(MerchantPostCreateRequest $request) {
        MerchantAddress::create(['address' => $request->address,'country_id' => $request->country,
        'region_id' => $request->region,'district_id' => $request->district,'city_id' => $request->city,'municipality_id' => $request->municipality,'barangay_id' => $request->barangay,'temp_status' => 1, 'prof_id'=> $this->profile->profile_check()->id]);

        return redirect()->back()->withSuccess('Successfully Added!');
    }

    public function address_edit($id) {

        $address = MerchantAddress::where('id',$id)->firstOrFail();
        $country = $this->country();

     return view('merchant_dashboard.profile.profile_address_form_edit',compact(['address','country']));

    }
    public function address_update(MerchantUpdateAddress $request, $id) {

        MerchantAddress::where('id',$id)->where('prof_id',$this->profile->profile_check()->id)->update(['address' => $request->address]);
        return redirect('merchant_dashboard/profile/profile')->withSuccess('Successfully Updated!');
    }

    public function address_delete($id) {

        $address_delete = MerchantAddress::where('id',$id)->where('prof_id',$this->profile->profile_check()->id)->firstOrFail();
        $address_delete->update(['temp_status'=> 4]);

        return redirect()->back()->withSuccess('Successfully deleted!');
    }
}
