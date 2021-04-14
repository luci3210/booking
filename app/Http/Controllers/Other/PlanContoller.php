<?php

namespace App\Http\Controllers\Other;

use App\Model\Merchant\MyplanModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PlanContoller extends Controller
{

 	public function index() {

 		if(Auth::check()) {	

 			$myplan = MyplanModel::join('temp_status','temp_status.id', 'myplans.temp_status')
            ->join('users','users.id', 'myplans.user_id')
                ->where('myplans.user_id', Auth::user()->id)
                ->where('temp_status.status','=','active')
                    ->get(['myplans.user_id','myplans.temp_status','temp_status.id','temp_status.status','users.id'])->first();

 			if(empty($myplan)) {

				return view('tourismo.subcription.plan');
			}
			else {

				 return redirect()->intended('merchant');	
			}
 		}
	    else {

	    	return view('tourismo.subcription.plan');
	    }
}
}
