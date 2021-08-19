<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\UserAuthService;
use App\Http\Requests\user\CreateUserRequest;

// tools
use Illuminate\Support\Faceds\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Model\Api\UsersModel;


class UserAuthController extends Controller
{
    //
    public function index(Request $req)
    {
        return $req->query('keyword');
    }

    // public function register(CreateUserRequest $req){
    //     $userService = new UserAuthService();
    //     $result = $userService->registration($req);
    //     return $result;
    // }

    public function register(Request $req){
        $userService = new UserAuthService();
        $result = $userService->registration($req->input());
        return $result;
    }

    public function login(Request $req){
        $userService = new UserAuthService();
        $token = base64_decode($req->query('token'));
        $userInfo = (array)json_decode($token);
        $result = $userService->login($userInfo);
        return $result;
    }
    public function update_profile(Request $req){
    }
    public function update_password(Request $req){
    }
    

    public function register_user(Request $req)
    {

        $userService = new UserAuthService();
        $result = $userService->user_reg($req->input());
        return $result;

    }


    public function login_user(Request $req)
    {   
        $response = [
            'success_flag'=>false,
            'message'=>null,
            'data'=> null,

        ];
        $email = $this->clean_input($req->email);
        $password = $this->clean_input($req->password);
        $validator = Validator::make($req->input(), [ 
            'email' => ['required', 'email', ],
            'password'=> ['required', 'string'],
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

        $token = $usedata->createToken('my-app-token')->plainTextToken;
        $response['success_flag'] = true;
        $response['data']['info'] = $usedata;
        $response['data']['token'] = $token;
       
        return response($response, 201);
    }
}
