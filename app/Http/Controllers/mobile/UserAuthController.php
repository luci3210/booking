<?php

namespace App\Http\Controllers\mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Merchant\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserAuthController extends Controller
{
    //
    public function index(Request $req)
    {
        return $req->query('keyword');
    }

    public function register(Request $req){
        $data['errors'] =null;
        $data['success'] = null;
        $data['data'] = null;

        $userData['name'] = $this->clean_input($req->name);
        $userData['pnumber'] = $this->clean_input($req->pnumber);
        $userData['email'] = $this->clean_input($req->email);

        $validator = Validator::make($req->input(), [ 
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required', 'min:5','string', 'unique:users'],
            'pnumber'=> ['required','min:11', 'string', 'unique:users'],
        ]);

        if($validator->fails()){
            $data['errors'] = $validator->errors();
            return $data;
        }

        $userData['created_at'] = $this->getDatetimeNow();
        $userData['password'] = Hash::make($userData['pnumber']); // hash
        $userId = UserModel::insertGetId($userData); // save dynamic key  value pairs, key must exist as cols in db
        $userData['user_id'] = $userId;

        if($userId == null){
            $data['errors'] = ['something went wrong'];
            return $data;
        }
        $success = array("msg"=>['successfully registered!']);
        $data['success'] = $success;
        $data['data'] = $userData;
        return $data;
    }

    public function login(Request $req){

        $data['errors'] =[];
        $data['success'] = [];
        $data['data'] = [];
        $token = base64_decode($req->query('token'));
        $userInfo = (array)json_decode($token);

        $validator = Validator::make($userInfo, [ 
            'email' => ['required', 'email', ],
            'name' => ['required', 'min:5','string', ],
            'pnumber'=> ['required','min:11', 'string',],
        ]);

        if($validator->fails()){
            $data['errors'] = $validator->errors();
            return $data;
        }
        
        $userData = UserModel::where('email', $userInfo['email']);
        $userData = $userData->where('pnumber',$userInfo['pnumber']);
        $userData = $userData->where('name',$userInfo['name']);
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
    public function update_profile(Request $req){
    }
    public function update_password(Request $req){
    }
}
