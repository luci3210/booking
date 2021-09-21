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

    // public function profile() {

    //     return Profile::leftJoin('merchant_verify','merchant_verify.id','profiles.plan_id')
            
    //         ->where(function($query) {
                
    //             $query->from('profiles')
    //                 ->where('profiles.company','<>','')
    //                     ->whereIn('merchant_verify.verify_id',[1,2]);

    //         })->get();
    // }

public function verify_check() {

    return Profile::join('merchant_verify','merchant_verify.prof_id','profiles.id')->orderBy('merchant_verify.id','desc')->first();
}

public function profile_details() {

    return Profile::where('id',Auth::user()->id)->get()->first();
}

public function index() {

   $data = Profile::leftJoin('merchant_verify','merchant_verify.id','profiles.plan_id')
        
        ->where(function($query) {
            
            $query->from('profiles')->where('profiles.company','<>','');

        })->select('profiles.*','merchant_verify.id as vid')->get(); 

    return view('admin.verification_request.index',compact('data'));
}

public function verification_edit_view($id) {

    $profile_details = Profile::leftJoin('merchant_verify','merchant_verify.id','profiles.plan_id')

        ->where(function($query) use($id) {
   
        $query->from('profiles')->where('profiles.id',$id);
   
    })->select('profiles.*','merchant_verify.id as vid','merchant_verify.verify_id')->first();

    if($profile_details) {

        return view('admin.verification_request.verification_form_edit',compact('profile_details'));

    } else {

        return view('errors.admin.web.pageNotfound');
    }
        
}

public function verification_update(AdminUpdateVerify $request, $id) {

        MerchantVerifyModel::create(['prof_id' =>$id, 'verify_id' => $request->status, 'description'=>$request->message]);
        return redirect()->back()->withSuccess('Successfully Updated!');
}

}
