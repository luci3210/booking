<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Services\UserAuthService;


class UserAuthController extends Controller
{
    //
    public function index(Request $req)
    {
        return $req->query('keyword');
    }

    public function register(Request $req){
       
        $userService = new UserAuthService();
        $userData['name'] = $this->clean_input($req->name);
        $userData['pnumber'] = $this->clean_input($req->pnumber);
        $userData['email'] = $this->clean_input($req->email);
        $result = $userService->registration($userData);
        return $result;
    }

    public function login(Request $req){

        $data['errors'] =[];
        $data['success'] = [];
        $data['data'] = [];
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
