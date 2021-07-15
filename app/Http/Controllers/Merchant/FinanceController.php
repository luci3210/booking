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
        $monthlyData = $financeService->getMonthlyIncome($profileID);
        $totalData = $financeService->getTotalIncome($profileID);
        $incomeData = [];
        $incomeData['weeklyData'] = $weeklyData;
        $incomeData['monthlyData'] = $monthlyData;
        $incomeData['totalData'] = $totalData;

        // return $merchantProfile->id;
        // return $totalData;
        return view('merchant_dashboard.finance.finance_income_index', compact('incomeData',));
    }
}
