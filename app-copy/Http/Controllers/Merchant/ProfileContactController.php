<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Merchant\ProfileController;

use App\Model\Merchant\MerchantContact;
use App\Model\Merchant\MerchantAddress;
use App\Model\Merchant\MerchantPermit;
use App\Model\Merchant\Profile;

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


    public function address_check() {

        return MerchantAddress::where('prof_id', $this->profile->profile_check()->id)->get('prof_id')->first();
    }

    public function permit_check() {
        
        return MerchantPermit::where('prof_id', $this->profile->profile_check()->id)->get('prof_id')->first();
    }

    public function contact_form() {

        return view('merchant_dashboard.profile.profile_contact');
    }

    public function contact_create(MerchantCreateContact $request) {

        $insert = MerchantContact::firstOrCreate(['fname' => $request->fname,'lname' => $request->lname,
            'email' => $request->email,'phonno' => $request->contact,'temp_status' => 1, 'prof_id'=> $this->profile->profile_check()->id, 'created_at' => now()]);

        if($insert) {
        
            return redirect('merchant/profile/profile')->withSuccess('Successfully Updated!');
        
        } else {

            return view('errors.merchant.web.pageNotfound');
        }

    }

    public function contact_edit($id) {


        $contact = MerchantContact::where( function($query) use($id) {
            $query->from('merchant_contact')->where([['id',$id],['prof_id',$this->profile->profile_check()->id],['temp_status',1]]);
        })->first();

        if($contact) {
            
            return view('merchant_dashboard.profile.profile_contact_form_edit',compact('contact'));

        } else {

            return view('errors.merchant.web.pageNotfound');

        }
        
    }
    public function contact_update(MerchantCreateContact $request, $id) {

        MerchantContact::where('id',$id)->where('prof_id',$this->profile->profile_check()->id)->update(['fname' => $request->fname,'lname' => $request->lname,
        'email' => $request->email,'phonno' => $request->contact]);
        return redirect('merchant/profile/profile')->withSuccess('Successfully Updated!');
    }

    public function contact_delete($id) {

        $check_delete = MerchantContact::where( function($query) {
            $query->from('merchant_contact')->where([['prof_id',$this->profile->profile_check()->id],['temp_status',1]]);
        })->get();

        if($check_delete) {

            if(count($check_delete) <= 1) {

                return redirect()->back()->withInfo('Contact, Cannot be deleted.');

            } else {

            $contact_delete = MerchantContact::where('id',$id)->where('prof_id',$this->profile->profile_check()->id)->firstOrFail();
            $contact_delete->update(['temp_status'=> 4]);

            return redirect()->back()->withSuccess('Successfully deleted.');
            }
        }
        else
        {
            return view('errors.merchant.web.pageNotfound');
        }


    }
}
