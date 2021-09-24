<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Admin\ProductModel;


class ServicesController extends Controller
{

public function __construct() {

    }

public function getServices() {

    $data = ProductModel::where(function($query) {
        $query->from('products')->where('temp_status',1);
            })->get();

    if(empty($data)) {

        return "No data found.";
        
    } else {

        return $data;
    }

}

}
