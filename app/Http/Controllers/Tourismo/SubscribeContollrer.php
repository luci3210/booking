<?php

namespace App\Http\Controllers\Tourismo;

use App\Model\Admin\PlanModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class SubscribeContollrer extends Controller
{
    public function __construct()
    {
    	// $this->middleware('auth:web');
    }
    public function index()
    {
    	$plan = PlanModel::join('temp_status','temp_status.id','=','plans.temp_status')
                ->join('admins','admins.id','=','plans.user_id')
                ->where('plans.temp_status','=','1')->get(['plans.*','temp_status.status','admins.id']);

    	return view('tourismo.subcription.index',compact('plan'));
    }
}
