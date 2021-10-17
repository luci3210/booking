<?php

namespace App\Http\Controllers\Tourismo;

use App\Model\Merchant\Profile;

use App\Model\Admin\PlanModel;
use App\Model\UserJobModel;
use App\Model\Merchant\MyplanModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SubscribeContollrer extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:web');
    }
    public function index()
    {
    	$plan = PlanModel::join('temp_status','temp_status.id','=','plans.temp_status')
                ->join('admins','admins.id','=','plans.user_id')
                ->where('plans.temp_status','=','1')->get(['plans.*','temp_status.status','admins.id']);

    	return view('tourismo.subcription.index',compact('plan'));
    }

    public function subscribe($id) {
        
        $plan =  PlanModel::join('temp_status','temp_status.id','=','plans.temp_status')
                    ->where('plans.temp_status','=','1')
                    ->where('plans.id', $id)->get(['plans.*','temp_status.status'])->first();

        return view('tourismo.subcription.subscription_form',compact('plan'));
    }


    public function add_subscribe(Request $request) {

         $input_validate = [
                'plan_name'     => 'required',
                'price'         => 'required',
                'package'       => 'required',
                'validity'      => 'required',
                //'end_date'      => 'required',
                'terms'         => 'required'
            ];

    $errMessage = ['required' => '* Enter your :attribute'];

    $this->validate($request, $input_validate, $errMessage);   

    $getLastData = MyplanModel::create(['user_id' => Auth::user()->id,
            'plan_name' => $request->plan_name,
            'plan_price' => $request->price,
            'plan_list' => $request->package,
            'validity' => $request->validity,
            // 'expired' => $request->end_date,
            'temp_status' => 1,
            'terms' => $request->terms]);

    $PlanId = $getLastData->id;
    $lastService = $getLastData->service_id;

    UserJobModel::create(['user_id' => Auth::user()->id,'job_id' => 2]);
    Profile::create(['plan_id'=>$PlanId,'user_id' => Auth::user()->id,'account_id' => uniqid().''.Auth::user()->id.''.substr(sha1(Auth::user()->id),19,-15)]);


    return redirect('merchant/plan')->withSuccess('Please update your merchant idintity.');
    }
}
