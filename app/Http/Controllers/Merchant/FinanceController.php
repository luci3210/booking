<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $incomeData = [];

        // return $merchantProfile->id;
        return $weeklyData;
        return view('merchant_dashboard.finance.finance_income_index', compact('incomeData'));
    }
}
