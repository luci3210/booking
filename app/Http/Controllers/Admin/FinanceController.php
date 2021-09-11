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

    $thisday = $this->thisday();
    $thismonth = $this->thismonth();
    
    $data = IncomeModel::join('status_payment','status_payment.ps_id','income.mi_payment_status_id')
        ->where( function($query) {
            
            $query->from('income');

        })->get();

    return view('admin.finance.index',compact('data','thisday','thismonth'));
} 

protected function thisday() {

    return IncomeModel::where( function($query) {
        $query->from('income')
            ->whereDay('created_at','=',date('d'))
            ->whereYear('created_at','=',date('Y'))
            ->whereMonth('created_at','=',date('m'));
    })->get()->sum('mi_tourismo_income');

}

protected function thismonth() {

    return IncomeModel::where( function($query) {
        $query->from('income')
            ->whereYear('created_at','=',date('Y'))
            ->whereMonth('created_at','=',date('m'));
    })->get()->sum('mi_tourismo_income');
}

protected function withdrawal() {

    dd('asas');
}
// protected function json_manual(Request $request) {
    
// }

}
