<?php

namespace App\Http\Controllers\Tourismo;


use RealRashid\SweetAlert\Facades\Alert;
use App\Model\Merchant\UserModel;
use App\Model\Admin\LocationCountyModel;

use App\Model\Merchant\Profile;
use App\Model\Merchant\MerchantModel;
use App\Model\Merchant\MyplanModel;

use App\Model\Admin\PlanModel;
use App\Model\Merchant\MerchantContact;
use App\Model\Merchant\MerchantAddress;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

use Jenssegers\Agent\Agent;

class AccountController extends Controller
{

 public function __construct()
 {
 	$this->middleware('auth:web');
 }   
 public function accnt_country() {

    return LocationCountyModel::where('temp_status',1)->get();
 }
 public function profile() {
    $data['error'] = [];
    $data['msg'] = [];
    $data['data'] = [];
    // /. data declaration


    $country = $this->accnt_country();
    // /. get countries
    $account = UserModel::where('users.id', Auth::user()->id)->get();
    // /.users info

    $data['data']['account'] = $account;
    $data['data']['country'] = $country;
    $Agent = new Agent();
        if ($Agent->isMobile()) {
            return view('tourismo.account.mobile.user_mobile',compact("data"));
        }else{
            return view('tourismo.account.user',compact("data"));
        }
    return 'something went wrong';
 }

 public function change_profile_pic(Request $req){
    $path = 'upload/merchant/profilepic/';
    $file = $req->file('file');
    $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';
    $upload = $file->move(public_path($path), $new_image_name);
    if(!$upload){
        return response()->json(['status'=>0, 'msg'=>'Something went wrong, try again later']);
    }
    $userData = UserModel::find(Auth::user()->id);
    $userData->profpic = $new_image_name;
    $userData->update();
    return response()->json(['status'=>1, 'msg'=>'Image has been cropped successfully.', 'profilepic'=>$new_image_name]);
}

    public function accnt_profile_update(Request $req) 
    {
        $userData['name'] = $req->name;
        $userData['fname'] = $req->fname;
        $userData['lname'] = $req->lname;
        $userData['mname'] = $req->mname;
        $userData['country'] = $req->country;
        $userData['pnumber'] = $req->pnumber;
        $userData['address'] = $req->address;
        $userData['bdate'] = $req->bdate;

        $this->validate($req,[ 
            'name' => ['required', 'string', ],
            'fname' => ['required'],
            'lname' => ['required', 'string', ],
            'mname' => ['required', 'string', ],
            'country' => ['required', ],
            'address' => ['required', 'string'],
            'bdate' => ['required',],
            'pnumber'=> ['required','min:11'],
        ]);


        $updateUser = UserModel::where('users.id', $req->id);
        $updateUser = $updateUser->update($userData);

        return redirect('account/profile')->withSuccess('Successfully updated!');
    }

















 public function myplan() 
 {
 
    return MyplanModel::join('temp_status','temp_status.id', 'myplans.temp_status')
            ->join('users','users.id', 'myplans.user_id')
                ->where('myplans.user_id', Auth::user()->id)
                ->where('temp_status.status','=','active')
                    ->get(['myplans.user_id','myplans.temp_status','temp_status.id','temp_status.status','users.id'])->first();
 }

 public function merchant()
 {

    return MyplanModel::join('temp_status','temp_status.id', 'myplans.temp_status')
        ->join('users','users.id', 'myplans.user_id')
        ->join('profiles','profiles.plan_id', 'myplans.id')
            ->where('myplans.user_id', Auth::user()->id)
            ->where('temp_status.status','=','active') ->get('profiles.*')->first();
 }

 public function contact() 
 {

    return Profile::join('merchant_contact','merchant_contact.prof_id','=','profiles.id')
                ->where('merchant_contact.temp_status','=','1')
                ->where('profiles.user_id','=',Auth::user()->id)
                    ->get(['profiles.*','merchant_contact.*']);
 }

 public function address() 
 {

    return Profile::join('merchant_address','merchant_address.prof_id','=','profiles.id')
                ->where('merchant_address.temp_status','=','1')
                ->where('profiles.user_id','=',Auth::user()->id)
                    ->get(['profiles.*','merchant_address.*']);
 }

 public function index()
 {

	if (session('success_message')) {
		Alert::success('Success!', session('success_message'));
	}

    $merchant       = $this->merchant();
    $contacts       = $this->contact();
    $address        = $this->address();

    if(empty($this->myplan())) 
        {
            return redirect()->intended('ph/plan');
        }
    else 
        {
            if(empty($merchant)) 
                {
                    return view('merchant.user.profile-form-update',compact(['merchant','contacts','address']));
                }
            else 
                {
                    return view('merchant.user.profile-form',compact(['merchant','contacts','address']));
                }
        }
}

public function profiles(Request $request)
{
 	 $rules = [
            'companyname'       => 'required',
            'about'             => 'required',
            'companyaddress'    => 'required',
            'email'             => 'required',
            'website'           => 'required',
            'telno'             => 'required',
            'mobileno'          => 'required'];

        $errMessage = ['required' => '* Enter your :attribute'];

   		$this->validate($request, $rules, $errMessage);   

        Profile::create(['company'      => $request->companyname,
                        'address'       => $request->companyaddress,
                        'about'         => $request->about,
                        'email'         => $request->email,
                        'telno'         => $request->telno,
                        'phonno'        => $request->mobileno,
                        'website'       => $request->website,
                      	'user_id' => Auth::user()->id]);
    return redirect('merchant')->withSuccess('Successfully added!');
}

public function profile_update(Request $request, $id)
{
	$rules = [
            'companyname'       => 'required',
            'companyaddress'    => 'required',
            'email'             => 'required',
            'website'           => 'required',
            'telno'             => 'required',
            'mobileno'          => 'required',
            'about'             => 'required'
            ];

    $errMessage = ['required' => 'Enter your :attribute'];

    $this->validate($request, $rules, $errMessage);

    $profile = Profile::find($id);
    $profile->update(['company' => $request->companyname,
                        'about' => $request->about,
                        'address' => $request->companyaddress,
                            'email' => $request->email,
                                'telno' => $request->telno,
                                    'phonno' => $request->mobileno,
                                        'website' => $request->website]);

	return redirect('merchant')->withSuccess('Successfully updated!');
}
public function profile_contacts()
{
	return view('merchant.user.contact-form');
}
public function profile_contacts_edit($id)
{
	$contacts = MerchantContact::join('profiles','profiles.id','=','merchant_contact.prof_id')
        ->join('users','users.id','=','profiles.user_id')
        ->join('temp_status','temp_status.id','=','merchant_contact.temp_status')
        ->where('merchant_contact.id','=', $id)
        ->where('profiles.user_id','=', Auth::user()->id)
        ->where('profiles.temp_status','=', 1)
        ->get(['merchant_contact.*','merchant_contact.id as mc_id','temp_status.status','temp_status.id','profiles.id','profiles.temp_status'])->first();

	return view('merchant.user.contact-form-edit',compact('contacts'));
}
public function profile_contacts_update(Request $request, $id)
{
$rules = [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required',
        'mobileno' => 'required'
    ];
    $errMessage = ['required' => 'Enter your :attribute'];

    $this->validate($request, $rules, $errMessage);

    $listings = MerchantContact::find($id);

    $listings->update(['fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'phonno' => $request->mobileno,
                    'temp_status' => 1]);

return redirect('merchant')->withSuccess('Successfully updated!');
}
public function profile_contacts_delete(Request $request, $id)
{
    $listings = MerchantContact::find($id);
    $listings->update(['temp_status'=> 4]);
	return redirect('merchant')->withSuccess('Successfully deleted!');
}






public function profile_addresses()
{
	return view('merchant.user.address-form');
}
public function profile_contacts_save(Request $request)
{
	 $rules = [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required',
        'mobileno' => 'required'
    ];

    $errMessage = ['required' => '* Enter your :attribute'];

    $this->validate($request, $rules, $errMessage);   

    MerchantContact::create(['fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'phonno' => $request->mobileno,
                    'temp_status' => 1,
                    'prof_id' => $request->prof_id]);
	return redirect('merchant')->withSuccess('Successfully updated!');
}
public function profile_address_save(Request $request)
{
	 $rules = [
        'address' => 'required',
        'longitude' => 'required',
        'latitude' => 'required'
    ];

    $errMessage = ['required' => '* Enter your :attribute'];

    $this->validate($request, $rules, $errMessage);   

    MerchantAddress::create(['address' => $request->address,
                    'longt' => $request->longitude,
                    'latt' => $request->latitude,
                    'temp_status' => 1,
                    'prof_id' => $request->prof_id]);
	return redirect('merchant')->withSuccess('Successfully updated!');
}

public function profile_address_edit($id)
{
	$address = MerchantAddress::join('profiles','profiles.id','=','merchant_address.prof_id')
        ->join('users','users.id','=','profiles.user_id')
        ->join('temp_status','temp_status.id','=','merchant_address.temp_status')
        ->where('merchant_address.id','=', $id)
        ->where('profiles.user_id','=', Auth::user()->id)
        ->where('profiles.temp_status','=', 1)
        ->get(['merchant_address.*','merchant_address.id as ma_id','temp_status.status','temp_status.id','profiles.id','profiles.temp_status'])->first();

	return view('merchant.user.address-form-edit',compact('address'));
}
public function profile_address_update(Request $request, $id)
{
	$rules = [
        'address' => 'required',
        'longitude' => 'required',
        'latitude' => 'required'
    ];

    $errMessage = ['required' => '* Enter your :attribute'];

    $this->validate($request, $rules, $errMessage);   



    $this->validate($request, $rules, $errMessage);

    $listings = MerchantAddress::find($id);

    $listings->update(['address' => $request->address,
                    'longt' => $request->longitude,
                    'latt' => $request->latitude]);

return redirect('merchant')->withSuccess('Successfully updated!');
}
public function profile_address_delete(Request $request, $id)
{
    $listings = MerchantAddress::find($id);
    $listings->update(['temp_status'=> 4]);
	return redirect('merchant')->withSuccess('Successfully deleted!');
}

}
