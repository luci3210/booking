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

use App\Services\UserAuthService;


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

    public function change_pass(Request $req)
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
            $email = $this->clean_input($user->email);
            $password = $this->clean_input($req->old_pass);
            $newpassword = $this->clean_input($req->new_pass);

            $validateData = [
                'password' => $password,
                'newpassword' => $newpassword,
            ];

            $validator = Validator::make($validateData, [ 
                'password' => ['required', 'string', ],
                'newpassword'=> ['required', 'string'],
            ]);
            if($validator->fails()){
                $response['message'] = $validator->errors();
                return response($response, 403);
            }

            $usedata = $this->check_credentials($email);

            if(is_string($usedata)){
                $response['message']['errors'] = $usedata;
                return response($response, 403);
            }

            $checkPass = $this->check_hash($usedata,$password);

            if(!$checkPass){
                $response['message']['errors'] = 'credentials error';
                return response($response, 403);
            }

            $userService = new UserAuthService();
            $userService = $userService->change_myPass($newpassword);


            $response['success_flag'] = $userService;
            $response['message']['success'] = $userService ?'change password success': 'failed to change password';
            $response['data']['user'] = $user;
            return $response;

        }catch (\Exception $e) {

            return response('not authorized', 401);

        }
    }
}
