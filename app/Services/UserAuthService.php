<?php

namespace  App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Model\Merchant\UserModel;
use App\Http\Requests\user\CreateUserRequest;
use App\Services\SecurityServices;

use Illuminate\Support\Facades\Auth;
use App\User;



Class UserAuthService extends SecurityServices{

    public function checkUserFields(){

        $userID = Auth::user()->id;
        $userData = User::find($userID);
        if(!$userData->fname 
        || !$userData->lname
        || !$userData->mname
        // || !$userData->gender
        || !$userData->country
        || !$userData->pnumber
        || !$userData->address
        || !$userData->bdate
        ){
            return  false;

        }
        return true;

    }

    public function checkEmail(){

        $userID = Auth::user()->id;
        $userData = User::find($userID);
        if(!$userData->email_verified_at){
            return  false;
        }
        return true;

    }

    public function registration($userData){
        $data['success'] = false;
        $data['message'] = [];
        $validator = Validator::make($userData, [ 
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required', 'min:5','string', 'unique:users'],
            'pnumber'=> ['required','min:11', 'string', 'unique:users'],
        ]);

        if($validator->fails()){
            $data['token'] = base64_encode(json_encode($userData));
            $data['message'] = $validator->errors();
            return $data;
        }


        $userInfo['pnumber'] =  $this->clean_input($userData['pnumber']);
        $userInfo['email'] =  $this->clean_input($userData['email']);
        $userInfo['name'] =  $this->clean_input($userData['name']);
        $userInfo['password'] = Hash::make($userData['pnumber']); // hash
        $userId = UserModel::insertGetId($userInfo); // save dynamic key  value pairs, key must exist as cols in db
        $userInfo['user_id'] = $userId;
        $success = 'successfully registered!';
        $data['message'] = $success;
        $data['success'] = true;
        $data['token'] = base64_encode(json_encode($userInfo));
        return $data;
    }



    // public function registration($userData){
    //     $userInfo['pnumber'] =  $this->clean_input($req->pnumber);
    //     $userInfo['email'] =  $this->clean_input($req->email);
    //     $userInfo['name'] =  $this->clean_input($req->name);
    //     $userInfo['password'] = Hash::make($req->pnumber); // hash
    //     $userId = UserModel::insertGetId($userInfo); // save dynamic key  value pairs, key must exist as cols in db
    //     $userInfo['user_id'] = $userId;
    //     $success = 'successfully registered!';
    //     $data['message'] = $success;
    //     $data['token'] = base64_encode(json_encode($userInfo));
    //     return $data;
    // }

    public function login($token){
        $data['success'] = false;

        $validator = Validator::make($token, [ 
            'email' => ['required', 'email', ],
            'name' => ['required', 'min:5','string', ],
            'password'=> ['required', 'string',],
        ]);

        if($validator->fails()){
            $data['message'] = $validator->errors();
            return $data;
        }

        $userData = UserModel::where('email', $token['email']);
        $userData = $userData->where('pnumber',$token['password']);
        $userData = $userData->where('name',$token['name']);
        $userData = $userData->get();


        if(count($userData) <= 0){
            $err = array("user"=>['no user found']);
            $data['errors'] = $err;
            return $data;
        }

        $success = 'successfully login!';
        $data['message'] = $success;
        $data['success'] = true;
        // $data['data'] = $userData;

        return $data;

    }



}