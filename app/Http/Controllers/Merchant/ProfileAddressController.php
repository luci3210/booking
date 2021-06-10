<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Merchant\ProfileController;

use App\Model\Merchant\MerchantAddress;
use App\Model\Merchant\MerchantCountyModel;

use App\Http\Requests\MerchantPostCreateRequest;
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

    public function address_form_update(MerchantPostCreateRequest $request) {
        MerchantAddress::create(['address' => $request->address,'country_id' => $request->country,
        'region_id' => $request->region,'district_id' => $request->district,'city_id' => $request->city,'municipality_id' => $request->municipality,'barangay_id' => $request->barangay,'temp_status' => 1, 'prof_id'=> $this->profile->profile_check()->id]);

        return redirect()->back()->withSuccess('Successfully Added!');
    }

}
