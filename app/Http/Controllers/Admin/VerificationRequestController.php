<?php

namespace App\Http\Controllers\Admin;

use App\Model\Merchant\Profile;
use App\Model\Merchant\MerchantContact;
use App\Model\Merchant\MerchantAddress;
use App\Model\Merchant\MerchantPermit;


use App\Model\MerchantVerifyModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VerificationRequestController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function profile_check() {

        return Profile::where('user_id',Auth::user()->id)->get(['user_id','id'])->first();
    }

    public function profile() {

        return Profile::join('myplans','myplans.id','=','profiles.plan_id')->get(['profiles.id as planid','profiles.company','profiles.created_at','myplans.plan_name','myplans.validity']);
    }


    public function profile_details() {

        return Profile::where('id',Auth::user()->id)->first();
    }
    

    public function index()
    {
        $profile_check = $this->profile_check();
        $profile = $this->profile();
        return view('admin.verification_request.index',compact(['profile','profile_check']));
    }

    public function verification_edit_view($id) {

        $profile_details = Profile::where('id', $id)->firstOrFail();
        $contact_details = MerchantContact::where('prof_id', $id)->firstOrFail();
        $address_details = MerchantAddress::where('prof_id', $id)->firstOrFail();
        $permit_pic = MerchantPermit::where('prof_id', $id)->get();

        return view('admin.verification_request.verification_form_edit',compact(['profile_details','contact_details','address_details','permit_pic']));        
    }
}
