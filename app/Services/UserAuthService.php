<?php

namespace  App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Model\Merchant\UserModel;
use App\Http\Requests\user\CreateUserRequest;
use App\Services\SecurityServices;


Class UserAuthService extends SecurityServices{

    public function registration(CreateUserRequest $req){
        $userInfo['pnumber'] =  $this->clean_input($req->pnumber);
        $userInfo['email'] =  $this->clean_input($req->email);
        $userInfo['name'] =  $this->clean_input($req->name);
        $userInfo['password'] = Hash::make($req->pnumber); // hash
        $userId = UserModel::insertGetId($userInfo); // save dynamic key  value pairs, key must exist as cols in db
        $userInfo['user_id'] = $userId;
        $success = 'successfully registered!';
        $data['message'] = $success;
        $data['data'] = $userInfo;
        return $data;
    }

    public function login($token){

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