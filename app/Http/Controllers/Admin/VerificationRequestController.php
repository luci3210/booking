<?php

namespace App\Http\Controllers\Admin;

use App\Model\Merchant\Profile;
use App\Model\Merchant\MerchantContact;
use App\Model\Merchant\MerchantAddress;
use App\Model\Merchant\MerchantPermit;


use App\Model\MerchantVerifyModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Http\Requests\AdminUpdateVerify;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VerificationRequestController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function profile_check() {

        return Profile::where('user_id',Auth::user()->id)->get(['   ','id'])->first();
    }

    public function profile() {

        return Profile::join('myplans','myplans.id','=','profiles.plan_id')->get(['profiles.id as planid','profiles.company','profiles.created_at','myplans.plan_name','myplans.validity']);
    }

    public function verify_check() {

        return MerchantVerifyModel::where('prof_id',$this->profile_check()->id)->get();
    }


    public function profile_details() {

        return Profile::where('id',Auth::user()->id)->first();
    }
    

    public function index()
    {
        $profile_check = $this->profile_check();
        $profile = $this->profile();
        $verify_check = $this->verify_check();
        return view('admin.verification_request.index',compact(['profile','profile_check','verify_check']));
    }

    public function verification_edit_view($id) {

        $profile_details = Profile::where('id', $id)->firstOrFail();
        $contact_details = MerchantContact::where('prof_id', $id)->firstOrFail();
        $address_details = MerchantAddress::where('prof_id', $id)->firstOrFail();
        $permit_pic = MerchantPermit::where('prof_id', $id)->get();

        return view('admin.verification_request.verification_form_edit',compact(['profile_details','contact_details','address_details','permit_pic']));        
    }

    public function verification_update(AdminUpdateVerify $request, $id) {

        MerchantVerifyModel::create(['prof_id' =>$id, 'verify_id' => $request->status, 'description'=>$request->message]);
        Profile::where('id',$id)->update(['id1' =>$request->status]);
        return redirect()->back()->withSuccess('Successfully Updated!');
    }
}
