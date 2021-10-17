<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Other\PlanContoller;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MerchantProfileController;

use App\Model\Merchant\Profile;
use App\Model\Merchant\HotelModel;
use App\Model\Merchant\MerchantAddress;
use App\Model\Merchant\MerchantContact;
use App\Model\Merchant\MerchantPermit;
use App\Model\ProfileUsersModel;
use App\Model\ProfileServiceModel;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

use App\Http\Requests\Merchant\UpdateProfile;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
	private $myplan;
    // private $services;
    private $identity;

public function __construct(PlanContoller $myplan, ServiceController $services, MerchantProfileController $identity) {

		$this->middleware('auth:web');

        $this->myplan = $myplan;
        // $this->theServices = $services;
        $this->getIdentity = $identity;
	}

public function index($account_id) {

    if($this->getIdentity->getHasProfile($account_id)) {

        return view('errors.merchant.web.pageNotAuthorized');
    }


    if(!$this->getIdentity->getAuthUser()->profile) {

        return $this->getIdentity->getAuthUser();
    }

    try {


        // return view('merchant_dashboard.profile.index',compact(['service_profile','profile_details','profile_address','profile_address_details','profile_contact','profile_contact_details','profile_permit','profile_permit_details','verify_check']));

        // $profile = $this->profile_check();
        // $profile_details = $this->profile_details();
        
        // $profile_contact = $this->contact_check();
        // $profile_contact_details = $this->contact_details();
        
        // $profile_address = $this->address_check();
        // $profile_address_details = $this->address_details();

        // $profile_permit = $this->permit_check();
        // $profile_permit_details = $this->permit_details();

        // $verify_check = $this->verify_check();
        // $service_profile = $this->profile_service();


        // return view('merchant_dashboard.profile.index',compact(['service_profile','profile_details','profile_address','profile_address_details','profile_contact','profile_contact_details','profile_permit','profile_permit_details','verify_check']));


        } catch(\Exception $e) {


        return view('errors.merchant.web.pageNotfound');

    }

    }

protected function profile_form($account_id) {

    if($this->getIdentity->getHasProfile($account_id)) {

        $data = $this->getIdentity->getHasProfile($account_id);
        return view('merchant_dashboard.profile.profile_new',compact('data'));
    }

    if(!$this->getIdentity->getAuthUser()->profile) {

        return $this->getIdentity->getAuthUser();
    }

    try {


        } catch(\Exception $e) {


        return view('errors.merchant.web.pageNotfound');

    }

    

       //  $profile = $this->profile_check();
       //  $profile_details = $this->profile_details();
       // //$services = $this->theServices->getServices();

     //   return view('merchant_dashboard.profile.profile',compact(['profile','profile_details','services']));
    }

protected function profile_create(UpdateProfile $request, $id, $account_id) {

    Profile::where([['id',$id],['account_id',$account_id]])->update(['company' => $request->company,
            'address'       => $request->address,
            'about'         => $request->about,
            'email'         => $request->email,
            'telno'         => $request->telno,
            'website'       => $request->website]); 

    ProfileUsersModel::firstOrCreate(['up_profile_id' => $id,
            'up_user_id' => Auth::user()->id,
                'up_role_id' => 1,
                    'pu_temp' => 1,
                        'pu_created_at' => now()]);

    return redirect('merchant/profile/profile/'.$account_id.'')->withSuccess('Profile successfully updated.');

}

protected function profile_form_update(UpdateProfile $request, $id) {

    if($this->profile_user_check('up_profile_id')) { 

    Profile::where('id',$id)->update(['company' => $request->company,
            'address'       => $request->address,
            'about'         => $request->about,
            'email'         => $request->email,
            'telno'         => $request->telno,
            'website'       => $request->website]);  

    return redirect()->back()->withSuccess('Profile successfully updated.');

    } 

    else 
    
    {

    Profile::where('id',$id)->update(['company' => $request->company,
            'address'       => $request->address,
            'about'         => $request->about,
            'email'         => $request->email,
            'telno'         => $request->telno,
            'website'       => $request->website]); 

    ProfileUsersModel::firstOrCreate(['up_profile_id' => $id,
            'up_user_id' => Auth::user()->id,
                'up_role_id' => 1,
                    'pu_temp' => 1,
                        'pu_created_at' => now()]);

    return redirect('merchant/profile/profile')->withSuccess('Profile successfully updated.');
    }
}




























































    protected function profile_service() {

        return Profile::join('profile_services','profile_services.ps_profile_id','profiles.id')
            ->join('products','products.id','profile_services.ps_service_id')
            ->where( function($query) {
            $query->from('profiles')->where([['profiles.id',$this->getIdentity->getAuthUser()->profile],['profile_services.ps_temp',1]]);
        })->select('profile_services.ps_id','profile_services.ps_profile_id','profile_services.ps_name','profile_services.ps_address','products.name','products.icon_id')->get();

    }

    public function profile_user_check() {

        return ProfileUsersModel::where( function($query) {
            $query->from('profile_users')->where('up_user_id',Auth::user()->id);
        })->first();
    }

	public function profile_check() {

        return Profile::where('user_id',Auth::user()->id)->get(['user_id','id','id1','company'])->first();
	}

    public function contact_check() {

        return MerchantContact::where('prof_id', $this->profile_check()->id)->get(['id','prof_id'])->first();
    }

    public function contact_details() {

        return MerchantContact::where('prof_id', $this->profile_check()->id)->where('temp_status',1)->get();
    }


	public function profile_details() {

		//return Profile::where('user_id',Auth::user()->id)->get()->first();
        return Profile::join('products','products.id','profiles.type')

            ->where(function($query) {

                $query->from('profiles')
                ->where('profiles.id',$this->getIdentity->getAuthUser()->profile);

            })->get()->first();

	}

    public function address_check() {

        return MerchantAddress::where('prof_id', $this->profile_check()->id)->get('prof_id')->first();
    }

    public function address_details() {

        return MerchantAddress::where('prof_id', $this->profile_check()->id)->where('temp_status',1)->get();
    }

    public function permit_check() {
        
        return MerchantPermit::where('prof_id', $this->profile_check()->id)->get('prof_id')->first();
    }

    public function permit_details() {
        
        return MerchantPermit::where('prof_id', $this->profile_check()->id)->where('temp_status',1)->get();
    }

    public function verify_check() {

        return Profile::join('merchant_verify','merchant_verify.prof_id','profiles.id')->orderBy('merchant_verify.id','desc')->first();
    }

    public function redi() {

        return redirect('merchant/profile/profile');
    }






public function merchant_permit(Request $request) {

        $image_validate = $request->validate([
          'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('file');
        $new_image_name = 'permit'.'_'.$this->profile_check()->id.'_'.date('Ymd').uniqid().'.jpg';
        $file->move(public_path('image/permit'), $new_image_name);

        
        $insert = MerchantPermit::firstOrCreate(['permit'=>$new_image_name,'prof_id'=>$this->profile_check()->id,'temp_status'=> 1]);

        if($insert) {

            return redirect()->back()->withSuccess('Successfully added!');    
        }

        else {
        
            return redirect()->back()->withInfo('Permit not uploaded, Please try again.');
        }

        }

}
