<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Other\PlanContoller;
use App\Model\Merchant\Profile;
use App\Model\Merchant\HotelModel;
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

		return Profile::where('user_id',Auth::user()->id)->get('user_id')->first();
	}

	public function profile_details() {

		return Profile::where('user_id',Auth::user()->id)->first();
	}

    public function index() {

    	$profile = $this->profile_check();
    	$profile_details = $this->profile_details();

    	return view('merchant_dashboard.profile.index',compact(['profile','profile_details']));
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

        HotelModel::create(['profid' => Auth::user()->id]);
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

    Profile::where('plan_id',$this->myplan->getPlan()->planid)->update(['company' => $request->merchant_name,
                        'address'       => $request->merchant_address,
                        'about'         => $request->about,
                        'email'         => $request->mail,
                        'telno'         => $request->telno,
                        'website'       => $request->website]);

	return redirect('merchant_dashboard/profile/profile')->withSuccess('Successfully updated!');
    }
}
