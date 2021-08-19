<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


// tools
use Illuminate\Support\Faceds\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Model\Api\UsersModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getDatetimeNow() {
	    $tz_object = new \DateTimeZone('Asia/Manila');
	    $datetime = new \DateTime();
        $datetime->setTimezone($tz_object);
	    return $datetime->format('Y\-m\-d\ H:i:s');
    }

    public function getDateNow() {
	    $tz_object = new \DateTimeZone('Asia/Manila');
	    $datetime = new \DateTime();
        $datetime->setTimezone($tz_object);
	    return $datetime->format('Y-m-d');
    }

    public function getDateNowv2() {
	    $tz_object = new \DateTimeZone('Asia/Manila');
	    $datetime = new \DateTime();
        $datetime->setTimezone($tz_object);
	    return $datetime->format('m-d-Y');
    }

    public function check_hash($user_data,$input_password){
        // left is text right is data that hash to compare
        if (Hash::check($input_password,  $user_data['password'])) {
            // The passwords match...
            return true;
        }
        return false;
    }

    public function check_credentials($email){
        $data['email'] = $email;
        if(!empty($email) ){
            $user_data = UsersModel::Where('email', $email)
            ->first();
            $user_data = !empty($user_data) ? $user_data : "no user found!";
            return $user_data;
            // if both exists
        }

        if(empty($email)){
            return "email is missing!!";
        }
        
        return "something went wrong!!";
    }

    
}
