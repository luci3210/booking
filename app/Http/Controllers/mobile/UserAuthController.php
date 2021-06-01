<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\UserAuthService;
use App\Http\Requests\user\CreateUserRequest;


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
}
