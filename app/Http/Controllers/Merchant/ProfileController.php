<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Other\PlanContoller;

use App\Model\Merchant\Profile;
use App\Model\Merchant\HotelModel;
use App\Model\Merchant\MerchantAddress;
use App\Model\Merchant\MerchantContact;
use App\Model\Merchant\MerchantPermit;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
	private $myplan;

	public function __construct(PlanContoller $myplan) {

		$this->middleware('auth:web');

		$this->myplan = $myplan;
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

		return Profile::where('user_id',Auth::user()->id)->get()->first();
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

    public function index() {

    	$profile = $this->profile_check();
    	$profile_details = $this->profile_details();
        
        $profile_contact = $this->contact_check();
        $profile_contact_details = $this->contact_details();
    	
        $profile_address = $this->address_check();
        $profile_address_details = $this->address_details();

        $profile_permit = $this->permit_check();
        $profile_permit_details = $this->permit_details();

        $verify_check = $this->verify_check();

    	return view('merchant_dashboard.profile.index',compact(['profile','profile_details','profile_address','profile_address_details','profile_contact','profile_contact_details','profile_permit','profile_permit_details','verify_check']));
    }

    public function profile_form() {

    	$profile = $this->profile_check();
    	$profile_details = $this->profile_details();

    	return view('merchant_dashboard.profile.profile',compact(['profile','profile_details']));
    }

    public function profile_form_submit(Request $request) {

    	$validate_input = ['merchant_name' => 'required',
            'about' => 'required',
            	'merchant_address' => 'required',
            		'mail' => 'required',
            			'website' => 'required',
            				'telno' => 'required'];

        $validate_message = ['required' => '* Enter your :attribute'];

   		$this->validate($request, $validate_input, $validate_message);   

        Profile::create(['company'      => $request->merchant_name,
                        'address'       => $request->merchant_address,
                        'plan_id'       => $this->myplan->getPlan()->planid,
                        'about'         => $request->about,
                        'email'         => $request->mail,
                        'telno'         => $request->telno,
                        'website'       => $request->website,
                      	'user_id'       => Auth::user()->id]);

        // HotelModel::create(['profid' => Auth::user()->id]);
   		return redirect('merchant_dashboard/profile/profile')->withSuccess('Successfully updated!');
    // return redirect()->back()->withSuccess('Successfully updated!');
    }

    public function profile_form_update(Request $request) {

    $validate_input = ['merchant_name' => 'required',
            'about' => 'required',
            	'merchant_address' => 'required',
            		'mail' => 'required',
            			'website' => 'required',
            				'telno' => 'required'];

    $validate_message = ['required' => '* Enter your :attribute'];

   	$this->validate($request, $validate_input, $validate_message); 

    if(empty($this->contact_check()->prof_id) || empty($this->address_check()->prof_id) || empty($this->permit_check()->prof_id)) {

        Profile::where('user_id',Auth::user()->id)->update(['company' => $request->merchant_name,
            'address'       => $request->merchant_address,
            'about'         => $request->about,
            'email'         => $request->mail,
            'telno'         => $request->telno,
            'website'       => $request->website]);   

        return redirect('merchant/profile/profile')->withSuccess('Successfully updated!');

    } else {

        Profile::where('user_id',Auth::user()->id)->update(['company' => $request->merchant_name,
            'address'       => $request->merchant_address,
            'about'         => $request->about,
            'email'         => $request->mail,
            'telno'         => $request->telno,
            'website'       => $request->website,
            'request_at' => date('Y/m/d'),
            'id1'       => 1]);  

        return redirect('merchant/profile/profile')->withSuccess('Successfully updated!');
    }

    }

    public function merchant_permit(Request $request) {

        // $validate = [
        //     'file'       => 'required|mimes:jpeg,png,jpg',
        // ];

        $file = $request->file('file');
        $new_image_name = 'permit'.'_'.$this->profile_check()->id.'_'.date('Ymd').uniqid().'.jpg';
        $file->move(public_path('image/permit'), $new_image_name);

        // $errMessage = ['required' => '* Enter your :attribute'];
        // $this->validate($request, $validate, $errMessage);   

        MerchantPermit::create(['permit'=>$new_image_name,'prof_id'=>$this->profile_check()->id,'temp_status'=> 1]);

        if(empty($this->contact_check()->prof_id) || empty($this->address_check()->prof_id) || empty($this->profile_check()->company)) {

        return back()->withSuccess('Successfully added!');

        } else {

        Profile::where('user_id',Auth::user()->id)->update(['request_at' => date('Y/m/d'),'id1'=> 1]);  
        return back()->withSuccess('Successfully added!');

        }

    }


}
