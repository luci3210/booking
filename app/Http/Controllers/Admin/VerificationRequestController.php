<?php

namespace App\Http\Controllers\Admin;

use App\Model\Merchant\Profile;
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
    

    public function index()
    {
        $profile_check = $this->profile_check();
        $profile = $this->profile();
        return view('admin.verification_request.index',compact(['profile','profile_check']));
    }

    public function verification_edit_view() {

        $profile_check = $this->profile_check();
        $profile = $this->profile();
        return view('admin.verification_request.index',compact(['profile','profile_check']));        
    }
}
