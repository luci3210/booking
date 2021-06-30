<?php

namespace App\Http\Controllers\Other;

use App\Model\Admin\PlanModel;
use App\Model\Merchant\MyplanModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PlanContoller extends Controller
{

 	public function index() {

 		$plan = $this->plan();

 		if(Auth::check()) {	

 			$myplan = MyplanModel::join('temp_status','temp_status.id', 'myplans.temp_status')
            ->join('users','users.id', 'myplans.user_id')
                ->where('myplans.user_id', Auth::user()->id)
                ->where('temp_status.status','=','active')
                    ->get(['myplans.user_id','myplans.temp_status','temp_status.id','temp_status.status','users.id'])->first();

 			if(empty($myplan)) {

				return view('tourismo.subcription.plan',compact('plan'));
			}
			else {

				 return redirect()->intended('tourismo/merchant');	
			}
 		}
	    else {

	    	return view('tourismo.subcription.plan',compact('plan'));
	    }
}

	public function plan() { 

		return PlanModel::join('temp_status','temp_status.id','=','plans.temp_status')
	                ->where('plans.temp_status','=','1')->get(['plans.*','temp_status.status']);
	}

	public function getPlan() {

        return MyplanModel::join('users','users.id', 'myplans.user_id')
                ->where('myplans.user_id', Auth::user()->id)->get(['myplans.id as planid'])->first();
    }

}
