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



Class GspService extends SecurityServices{
    private $gspUrl = 'https://gopartner.goshoppingphilippines.com/';

    public function postRequest($gspToken,$url){
        $uri = $this->gspUrl.''.$url;
        $ch = curl_init($uri);

        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
            'Content-type: application/json',
            'Authorization: Bearer '.$gspToken,
        ));

        $result = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($result, true);
        $saveRes = $this->saveUser($data['data']);
        $data['response'] = $saveRes;
        return $data;
    }

    private function saveUser($userData){
        $validaData = [];
        $validaData['pnumber']= $userData['mobile_number'];
        $validaData['email'] = $userData['email'];
        
        $validator = Validator::make($validaData, [ 
            'email' => ['required', 'email', 'unique:users'],
            'pnumber'=> ['required','min:10', 'string', 'unique:users'],
        ]);

        if($validator->fails()){
            $data['message'] = $validator->errors();
            return $data['message'];
        }

        $userInfo['pnumber'] =  $this->clean_input($userData['mobile_number']);
        $userInfo['email'] =  $this->clean_input($userData['email']);
        $userInfo['name'] =  $this->clean_input($userData['first_name']).'-'.$this->clean_input($userData['last_name']);
        $userInfo['fname'] =  $this->clean_input($userData['first_name']);
        $userInfo['lname'] =  $this->clean_input($userData['last_name']);
        $userInfo['password'] = Hash::make($userData['email']); // hash
        $userInfo['created_at'] =  $this->getDatetimeNow();
        $userInfo['email_verified_at'] =  $this->getDatetimeNow();
        $userId = UserModel::insertGetId($userInfo); // save dynamic key  value pairs, key must exist as cols in db

        return 'success';
        
    }


    

}