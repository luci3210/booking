<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\IncomeModel;
use App\Model\IncomeWithdrawModel;

class Accounting extends Controller
{

public function __construct() {

    }

public function companyTotal() {

    $data = IncomeModel::where(function($query) {
        $query->from('income');
            })->get()->sum('mi_tourismo_income');

    if(empty($data)) {

        return "0.00";
        
    } else {

        return $data;
    }

}

public function merchantTotal() {

    $data = IncomeModel::where(function($query) {
        $query->from('income');
            })->get()->sum('mi_merchant_income');
    
    if(empty($data)) {

        return "0.00";
        
    } else {

        return $data;
    }
}

public function merchantTotalWithdrawals() {

    $data = IncomeWithdrawModel::where(function($query) {
        $query->from('income_withdrawals')
            ->where('iw_temp',11);
            })->get()->sum('iw_withdraw_amount');
    
    if(empty($data)) {

        return "0.00";
        
    } else {

        return $data;
    }
}


public function totalPaidAmount() {

    $data = IncomeModel::where(function($query) {
            $query->from('income');
                })->get()->sum('mi_paid_amount');

    if(empty($data)) {

        return "0.00";

    } else {

        return $data;
    }

}

}
