<?php

namespace  App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Model\Merchant\UserModel;


Class UserAuthService{

    public function registration($userInfo){
        $data['errors'] =[];
        $data['success'] = [];
        $data['data'] = [];


        $validator = Validator::make($userInfo, [ 
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required', 'min:5','string', 'unique:users'],
            'pnumber'=> ['required','min:11', 'string', 'unique:users'],
        ]);

        if($validator->fails()){
            $data['errors'] = $validator->errors();
            return $data;
        }

        $userInfo['password'] = Hash::make($userInfo['pnumber']); // hash
        $userId = UserModel::insertGetId($userInfo); // save dynamic key  value pairs, key must exist as cols in db
        $userInfo['user_id'] = $userId;

        if($userId == null){
            $data['errors'] = ['something went wrong'];
            return $data;
        }
        $success = array("msg"=>['successfully registered!']);
        $data['success'] = $success;
        return $data;

    }

    public function login($token){
        $data['errors'] =[];
        $data['success'] = [];
        $data['data'] = [];

        $validator = Validator::make($token, [ 
            'email' => ['required', 'email', ],
            'name' => ['required', 'min:5','string', ],
            'pnumber'=> ['required','min:11', 'string',],
        ]);

        if($validator->fails()){
            $data['errors'] = $validator->errors();
            return $data;
        }

        $userData = UserModel::where('email', $token['email']);
        $userData = $userData->where('pnumber',$token['pnumber']);
        $userData = $userData->where('name',$token['name']);
        $userData = $userData->get();


        if(count($userData) <= 0){
            $err = array("user"=>['no user found']);
            $data['errors'] = $err;
            return $data;
        }

        $success = array("msg"=>['successfully login!']);
        $data['success'] = $success;
        $data['data'] = $userData;

        return $data;

    }



}