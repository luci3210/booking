<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

// tools
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Model\Api\UsersModel;


class UserProfileController extends Controller
{
    //

    public function get_myinfo(Request $req)
    {
        try{
            $response = [
                'success_flag'=>false,
                'message' => null,
                'data'=> null,
            ];
            $user = Auth::user();
            if(!$user){
                return response('not authorized', 401);
            }
            $response['success_flag'] = true;
            $response['message']['success'] = 'user found';
            $response['data']['user'] = $user;
            return $response;

        }catch (\Exception $e) {

            return response('not authorized', 401);

        }
    }
}
