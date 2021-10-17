<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\Merchant\ProfileModel;
use App\Model\Merchant\Profile;


class MerchantProfileController extends Controller
{

public function __construct() {

        $this->middleware('auth:web');

    }

public function getAuthUser() {

    try {
    
     return ProfileModel::join('profile_users','profiles.id','profile_users.up_profile_id')

        ->where(function($query) {

            $query->from('profile_users')->where([['profile_users.up_user_id',Auth::user()->id],['profile_users.pu_temp',1]]);
            
        })->select('profile_users.up_profile_id as profile','profile_users.up_user_id')->firstOrFail();
    
    }

    catch(\Exception $e)

    {

        if(Auth::check()) {

            //return abort(404, 'Page not found.');
            return view('errors.merchant.web.pageNotAuthorized');

        } else {

            return abort(404, 'Page not found.');
        }


    }

}


public function getProfilesVerify() {

    try {
    
     return ProfileModel::join('merchant_verify','profiles.id','merchant_verify.prof_id')

        ->where(function($query) {

            $query->from('profile_users')->where([['profile_users.up_user_id',Auth::user()->id],['profile_users.pu_temp',1]]);
            
        })->select('profile_users.up_profile_id as profile','profile_users.up_user_id')->firstOrFail();
    
    }

    catch(\Exception $e)

    {

        if(Auth::check()) {

            //return abort(404, 'Page not found.');
            return view('errors.merchant.web.pageNotAuthorized');

        } else {

            return abort(404, 'Page not found.');
        }


    }

}

public function getHasProfile($account_id) {

    try {

       return Profile::where(function($query) use($account_id) {
                $query->from('profiles')
                    ->where([['profiles.account_id',$account_id],['profiles.user_id',Auth::user()->id],['profiles.company','']]);
            })->first();
    } 

    catch(\Exception $e) 

    {

         if(Auth::check()) {

            return view('errors.merchant.web.pageNotAuthorized');

        } else {

            return abort(404, 'Page not found.');
        }

    }
}

}
