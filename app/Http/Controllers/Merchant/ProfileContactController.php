<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Merchant\ProfileController;

use App\Model\Merchant\MerchantContact;

use App\Http\Requests\MerchantCreateContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileContactController extends Controller
{
    
    private $profile;

    public function __construct(ProfileController $profile) {

        $this->middleware('auth:web');

        $this->profile = $profile;
    }

    public function contact_form() {

        return view('merchant_dashboard.profile.profile_contact');
    }

    public function contact_create(MerchantCreateContact $request) {

        MerchantContact::create(['fname' => $request->fname,'lname' => $request->lname,
        'email' => $request->email,'phonno' => $request->contact,'temp_status' => 1, 'prof_id'=> $this->profile->profile_check()->id]);

        return redirect()->back()->withSuccess('Successfully Added!');
    }

    public function contact_edit($id) {

        $contact = MerchantContact::where('id',$id)->firstOrFail();
        return view('merchant_dashboard.profile.profile_contact_form_edit',compact('contact'));

    }
    public function contact_update(MerchantCreateContact $request, $id) {

        MerchantContact::where('id',$id)->where('prof_id',$this->profile->profile_check()->id)->update(['fname' => $request->fname,'lname' => $request->lname,
        'email' => $request->email,'phonno' => $request->contact]);
        return redirect('merchant_dashboard/profile/profile')->withSuccess('Successfully Updated!');
    }

    public function contact_delete($id) {

        $contact_delete = MerchantContact::where('id',$id)->where('prof_id',$this->profile->profile_check()->id)->firstOrFail();
        $contact_delete->update(['temp_status'=> 4]);

        return redirect()->back()->withSuccess('Successfully deleted!');
    }
}
