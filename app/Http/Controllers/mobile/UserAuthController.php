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


    public function login_user(Request $req)
    {   
        $response = [
            'success_flag'=>false,
            'data'=> null,
            'message'=>null

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

        $user= UsersModel::where('email', $req->email)->first();
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
}
