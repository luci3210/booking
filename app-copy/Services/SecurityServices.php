<?php

namespace App\Services;

class SecurityServices{

    public function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function check_hash($table,$inputValue,$data){
        # code...
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

    
}