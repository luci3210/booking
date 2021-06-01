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

    
}