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
use App\Http\Requests\MerchantPostWithdrawRequest;

use App\Model\PaymentStatusModel;
use App\Model\IncomeWithdrawModel;
use App\Model\PaymentModel;
use App\Model\IncomeModel;


class FinanceController extends Controller
{
    
    private $profile;

    public function __construct(ProfileController $profile) {

        $this->middleware('auth:web');

        $this->profile = $profile;
    }

    protected function income() {

        $thisday = $this->thisday();
        $thismonth = $this->thismonth();

        return view('merchant_dashboard.finance.income',compact('thisday','thismonth'));        
    } 

    protected function thisday() {

    return IncomeModel::where( function($query) {
        $query->from('income')
            ->where('mi_merchant_prof_id',$this->profile->profile_check()->id)
            ->whereDay('created_at','=',date('d'))
            ->whereYear('created_at','=',date('Y'))
            ->whereMonth('created_at','=',date('m'));
    })->get()->sum('mi_tourismo_income');

    }

    protected function thismonth() {

    return IncomeModel::where( function($query) {
        $query->from('income')
            ->where('mi_merchant_prof_id',$this->profile->profile_check()->id)
            ->whereYear('created_at','=',date('Y'))
            ->whereMonth('created_at','=',date('m'));
    })->get()->sum('mi_tourismo_income');

    }

protected function income_total_balance() {

    return $data = IncomeModel::where(function($query) {
                $query->from('income')
                    ->where('mi_merchant_prof_id',$this->profile->profile_check()->id);
        })->get()->sum('mi_merchant_income');

}

protected function income_total_withdrawals() {

    return $data = IncomeWithdrawModel::where(function($query) {
                $query->from('income_withdrawals')
                    ->where('iw_withdraw_profid',$this->profile->profile_check()->id)
                        ->where('iw_temp',9);
        })->get()->sum('iw_withdraw_amount');
}

protected function withdraw() {

    $thisday = $this->thisday();
    $thismonth = $this->thismonth();
    $banklist = $this->banklist();
    $transaction = $this->transaction();

    $income_total_withdraw = $this->income_total_withdrawals();
    $income_total_balance = $this->income_total_balance();

    $new_balance = $income_total_balance - $income_total_withdraw;

    return view('merchant_dashboard.finance.withdraw',compact('income_total_balance','new_balance','thisday','thismonth','banklist','transaction'));     

}

protected function withdraw_submit(MerchantPostWithdrawRequest $request) {

    IncomeWithdrawModel::firstOrCreate(['iw_withdraw_amount' => $request->amount,
            'iw_withdraw_bank_account_id' => $request->bank_account,
                'iw_withdraw_balane' => $request->balance,
                    'iw_withdraw_profid' => $this->profile->profile_check()->id,
                        'iw_temp' => 8,
                            'iw_created_at' => now()]);

    return redirect()->back()->withSuccess('Successfully submitted request');

}

protected function transaction() {

    return $data = IncomeWithdrawModel::Join('bank_accounts','bank_accounts.id','income_withdrawals.iw_withdraw_bank_account_id')
            ->join('bank_names','bank_names.id','bank_accounts.account_bank_id')
            ->join('profiles','profiles.id','income_withdrawals.iw_withdraw_profid')
            ->join('temp_status','temp_status.id','income_withdrawals.iw_temp')

            ->where(function($query) {
                $query->from('income_withdrawals')
                    ->where('income_withdrawals.iw_withdraw_profid',$this->profile->profile_check()->id)
                        ->whereIn('income_withdrawals.iw_temp',[8,9]);
        })->get();
}

    protected function banklist() {

        return BankAccountModel::join('bank_names','bank_names.id','bank_accounts.account_bank_id')
            ->where(function($query) {
                $query->from('bank_accounts')
                    ->where('bank_accounts.profid',$this->profile->profile_check()->id)
                        ->whereIn('bank_accounts.status',[1,2]);
                    
        })->select('bank_accounts.id as ba_id','bank_accounts.account_name','bank_names.bank')
                ->get();

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

        // $data = PaymentStatusModel::join('payments','payments.pm_ps_id','status_payment.ps_id')

        //  $data = PaymentModel::join('service_tour','service_tour.id','payments.pm_page_id')
        //     ->join('products','service_tour.service_id','products.id')
        //          ->join('users','users.id','payments.pm_user_id')
        //               ->join('location_country','location_country.location_id','users.country')
        //                 ->join('charges','charges.chrg_product_id','service_tour.service_id')
             
        //         ->where( function($query) use($pm_id,$product_name) {
        //             $query->from('payments')->where([
        //             ['payments.pm_id',$pm_id],
        //                 ['service_tour.profid',$this->profile->profile_check()->id],
        //                     ['products.description',$product_name]]);
        // })->get();


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
