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

        return Profile::where('user_id',Auth::user()->id)->get(['id'])->first();
    }

     public function contact_check() {

        return MerchantContact::where('prof_id', $this->profile_check()->id)->get(['id','prof_id'])->first();
    }

    public function address_check() {

        return MerchantAddress::where('prof_id', $this->profile_check()->id)->get('prof_id')->first();
    }

      public function permit_check() {
        
        return MerchantPermit::join('profiles','merchant_permit.prof_id','profiles.id')->get('merchant_permit.prof_id as permit')->first();
    }

    public function profile() {

        return Profile::join('myplans','myplans.id','profiles.plan_id')
            ->whereIn('profiles.id1',[1,2])
        ->get(['profiles.request_at','profiles.id as planid','profiles.company','myplans.validity','myplans.plan_name','myplans.id','profiles.user_id','profiles.id1']);
    }

    public function verify_check() {

        return Profile::join('merchant_verify','merchant_verify.prof_id','profiles.id')->orderBy('merchant_verify.id','desc')->first();
    }


    public function profile_details() {

        return Profile::where('id',Auth::user()->id)->get()->first();
    }

    public function index()
    {

        $contact_check = $this->contact_check();
        $address_check = $this->address_check();
        $permit_check = $this->permit_check();
        $profile = $this->profile();
        $verify_check = $this->verify_check();  

        return view('admin.verification_request.index',compact(['verify_check','profile','contact_check','address_check','permit_check']));
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
