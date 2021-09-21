<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Merchant\ProfileController;

use App\Model\Merchant\MerchantCountyModel;
use App\Model\Merchant\MerchantContact;
use App\Model\Merchant\MerchantAddress;
use App\Model\Merchant\MerchantPermit;
use App\Model\Merchant\Profile;

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


    public function permit_check() {
        
        return MerchantPermit::where('prof_id', $this->profile->profile_check()->id)->get('prof_id')->first();
    }

    public function contact_check() {

        return MerchantContact::where('prof_id', $this->profile->profile_check()->id)->get(['id','prof_id'])->first();
    }

    public function country() {

        return MerchantCountyModel::where('temp_status',1)->orderBy('country')->get();
    }

    public function address_form() {

        return view('merchant_dashboard.profile.profile_address');
    }

    public function address_create(MerchantPostCreateRequest $request) {

        $insert = MerchantAddress::firstOrCreate(['address' => $request->address,'temp_status' => 1, 'prof_id'=> $this->profile->profile_check()->id,'created_at' => now()]);

        if($insert) {
        
            return redirect('merchant/profile/profile')->withSuccess('Successfully Updated!');
        
        } else {

            return view('errors.merchant.web.pageNotfound');
        }
    }

    public function address_edit($id) {

        $address = MerchantAddress::where( function($query) use($id) {

            $query->from('merchant_address')->where([['id',$id],['prof_id',$this->profile->profile_check()->id],['temp_status',1]]);
        
        })->first();

        if($address) {
            
            return view('merchant_dashboard.profile.profile_address_form_edit',compact('address'));

        } else {

            return view('errors.merchant.web.pageNotfound');

        }

    }
    public function address_update(MerchantUpdateAddress $request, $id) {

        MerchantAddress::where('id',$id)->where('prof_id',$this->profile->profile_check()->id)->update(['address' => $request->address]);
        return redirect('merchant/profile/profile')->withSuccess('Successfully Updated!');
    }

    public function address_delete($id) {

        $check_delete = MerchantAddress::where( function($query) {
            $query->from('merchant_address')->where([['prof_id',$this->profile->profile_check()->id],['temp_status',1]]);
        })->get();

        if($check_delete) {

            if(count($check_delete) <= 1) {

                return redirect()->back()->withInfo('Address, Cannot be deleted.');

            } else {

            $address_delete = MerchantAddress::where('id',$id)->where('prof_id',$this->profile->profile_check()->id)->firstOrFail();
            $address_delete->update(['temp_status'=> 4]);

            return redirect()->back()->withSuccess('Successfully deleted.');

            }
        }
        else
        {
            return view('errors.merchant.web.pageNotfound');
        }
}
}
