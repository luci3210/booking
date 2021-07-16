<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Admin\BankModel;
use App\Services\merchant\FinanceService;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    //

    public function incomeIndex(Request $req)
    {
        $financeService = new FinanceService();
        $merchantProfile = $financeService->getMyProfile(Auth::user()->id);
        $profileID = $merchantProfile->id;
        $weeklyData = $financeService->getWeeklyIncome($profileID);
        $monthlyData = $financeService->getMonthlyIncome($profileID);
        $incomeData = [];

        // return $merchantProfile->id;
        return $monthlyData;
        return view('merchant_dashboard.finance.finance_income_index', compact('incomeData'));
    }

    public function bank_list() {

        return BankModel::join('temp_status','temp_status.id','bank_names.status')->where('bank_names.status',1)->orderBy('bank','asc')->get(['bank_names.id as bid','bank_names.bank','bank_names.status','temp_status.id as tid','temp_status.status as tstatus']);  
    }

    public function bank() {

        $bank_list = $this->bank_list();
        return view('merchant_dashboard.finance.bank_form',compact('bank_list'));
    }
}
