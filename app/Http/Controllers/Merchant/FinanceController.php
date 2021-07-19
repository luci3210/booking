<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Merchant\ProfileController;
use Illuminate\Http\Request;

use App\Model\Admin\BankModel;
use App\Model\Merchant\BankAccountModel;
use App\Services\merchant\FinanceService;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\MerchantPostBank;


class FinanceController extends Controller
{
    
    private $profile;

    public function __construct(ProfileController $profile) {

        $this->middleware('auth:web');

        $this->profile = $profile;
    }

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

        return view('merchant_dashboard.finance.finance_income_index', compact('incomeData'));
    }

    public function mybalance() {

        $bank_list = $this->bank_list();
        $account_list = $this->account_list();
        return view('merchant_dashboard.finance.mybalance_form',compact('bank_list','account_list'));

    }

    public function bank_list() {

        return BankModel::join('temp_status','temp_status.id','bank_names.status')->whereIn('bank_names.status',[1,2])->orderBy('bank','asc')->get(['bank_names.id as bid','bank_names.bank','bank_names.status','temp_status.id as tid','temp_status.status as tstatus']);  
    }

    public function account_list() {

        return BankAccountModel::join('temp_status','temp_status.id','bank_accounts.status')
            ->join('bank_names','bank_names.id','bank_accounts.account_bank_id')
                ->whereIn('bank_accounts.status',[1,2])->orderBy('bank','asc')
                    ->get(['bank_names.bank','bank_accounts.account_name','bank_accounts.account_number','bank_accounts.status']);  
    }

    public function merchant_bank_create(MerchantPostBank $request) {
        
        BankAccountModel::create(['account_name' => $request->account_name,
                    'account_bank_id' => $request->bank_name,
                        'account_number' => $request->account_num,
                            'profid' => $this->profile->profile_check()->id,
                                'status' => 2]);

        return redirect()->back()->withSuccess('Successfully Added!');

    }

    public function bank() {

        $bank_list = $this->bank_list();
        $account_list = $this->account_list();
        return view('merchant_dashboard.finance.bank_form',compact('bank_list','account_list'));
    }
}
