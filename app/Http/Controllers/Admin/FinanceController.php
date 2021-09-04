<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\ChargesModel;
use App\Model\IncomeModel;


class FinanceController extends Controller
{

public function __construct() {

    $this->middleware('auth:admin');
}

protected function income() {

    // $byday = $this->thisday();

    $data = IncomeModel::join('status_payment','status_payment.ps_id','income.mi_payment_status_id')
        ->where( function($query) {
            
            $query->from('income');

        })->get();

    return view('admin.finance.index',compact('data'));
} 

// protected function thisday() {

//     return $ss = IncomeModel::where( function($query) {
//         $query->from('status_payment')
//             ->whereDate('created_at',data('d'));
//     })->get()->sum('mi_tourismo_income');

// }

}
