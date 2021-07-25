<?php

namespace App\Http\Controllers\gsp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\GspService;

class ApiController extends Controller
{
    //


    public function index(Request $req)
    {
        $gspToken =  $req->query('goToken');
        $gspService = new GspService();
        $result = $gspService->postRequest($gspToken,'api/tourismo/userinfo');
        return $result;
    }
}
