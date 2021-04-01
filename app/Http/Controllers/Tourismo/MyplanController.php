<?php

namespace App\Http\Controllers\Tourismo;

use App\Model\Tourismo\MyplanModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class MyplanController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:web');
    }
    public function index()
    {
    	$plan = MyplanModel::join('temp_status','temp_status.id','=','myplans.temp_status')
                ->join('users','users.id','=','myplans.user_id')
                ->where('myplans.temp_status','=','1')->get(['myplans.*','temp_status.status','users.id']);
    	return view('tourismo.myplan.index',compact('plan'));
    }
}
