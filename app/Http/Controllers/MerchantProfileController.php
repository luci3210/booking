<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Model\Merchant\ProfileModel;


class MerchantProfileController extends Controller
{

public function __construct() {

        $this->middleware('auth:web');

    }

public function getAuthUser() {

    $authUser = ProfileModel::join('profile_users','profiles.id','profile_users.up_profile_id')

        ->where(function($query) {

            $query->from('profile_users')->where([['profile_users.up_user_id',Auth::user()->id],['profile_users.pu_temp',1]]);
            
        })->select('profile_users.up_profile_id as profile','profile_users.up_user_id')->firstOrFail();

    if(!$authUser) {

        abort(403, 'Unauthorized action.');

    } else {

        return $authUser;

    }

}

}
