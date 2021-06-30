<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Merchant\UserModel;

class UserLoginController extends Controller
{
    //

    public function checkLogin(Request $req){
        $userModel = new UserModel();
        $email = $this->clean_input($req->email);
        $password = $this->clean_input($req->password);
        $userModel = $userModel->where('email',$email);
        $userModel = $userModel->first();

        if(empty($userModel)){
            return 'no user found';
        }

        $checkLogin  = $this->check_hash($userModel,$password);
        if(!$checkLogin){
            return 'credentials error';
        }
        return true;
    }
}
