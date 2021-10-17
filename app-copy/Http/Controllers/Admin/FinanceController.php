<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Accounting;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Model\ChargesModel;
use App\Model\IncomeModel;
use App\Model\IncomeWithdrawModel;


class FinanceController extends Controller
{

    private $accounting;

    public function __construct(Accounting $accounting) {

        $this->accounting = $accounting;
        $this->middleware('auth:admin');
    }

protected function income() {

    $thisday = $this->thisday();
    $thismonth = $this->thismonth();

    $total_paid_amount = number_format($this->accounting->totalPaidAmount(),2);

    $merchant_total_income = number_format($this->accounting->merchantTotal(),2);
    $merchantTotalWithdrawals = number_format($this->accounting->merchantTotalWithdrawals(),2);

    $company_total_income = number_format($this->accounting->companyTotal(),2);

    
    $data = IncomeModel::join('status_payment','status_payment.ps_id','income.mi_payment_status_id')
        ->where( function($query) {
            
            $query->from('income');

        })->get();

    return view('admin.finance.index',compact('data','thisday','thismonth','total_paid_amount','merchant_total_income','company_total_income','merchantTotalWithdrawals'));
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


protected function withdrawals() {

    $withdrawal_request = $this->withdrawal_request();
    $withdrawal_process = $this->withdrawal_process();
    $withdrawal_success = $this->withdrawal_success();

    return view('admin.finance.withdrawal',compact('withdrawal_request','withdrawal_process','withdrawal_success'));    
}

protected function withdrawal_request() {

    return $data = IncomeWithdrawModel::Join('bank_accounts','bank_accounts.id','income_withdrawals.iw_withdraw_bank_account_id')
        ->join('bank_names','bank_names.id','bank_accounts.account_bank_id')
            ->join('profiles','profiles.id','income_withdrawals.iw_withdraw_profid')
                ->join('temp_status','temp_status.id','income_withdrawals.iw_temp')
                    ->join('users','users.id','income_withdrawals.iw_process_by')

        ->where(function($query) {
            $query->from('income_withdrawals')
                    ->where('income_withdrawals.iw_temp',8);
    })->get();

}

protected function withdrawal_process() {

    return $data = IncomeWithdrawModel::Join('bank_accounts','bank_accounts.id','income_withdrawals.iw_withdraw_bank_account_id')
        ->join('bank_names','bank_names.id','bank_accounts.account_bank_id')
            ->join('profiles','profiles.id','income_withdrawals.iw_withdraw_profid')
                ->join('temp_status','temp_status.id','income_withdrawals.iw_temp')
                    ->join('users','users.id','income_withdrawals.iw_process_by')


        ->where(function($query) {
            $query->from('income_withdrawals')
                    ->where('income_withdrawals.iw_temp',9);
    })->get();

}

protected function withdrawal_success() {

    return $data = IncomeWithdrawModel::Join('bank_accounts','bank_accounts.id','income_withdrawals.iw_withdraw_bank_account_id')
        ->join('bank_names','bank_names.id','bank_accounts.account_bank_id')
            ->join('profiles','profiles.id','income_withdrawals.iw_withdraw_profid')
                ->join('temp_status','temp_status.id','income_withdrawals.iw_temp')
                    ->join('users','users.id','income_withdrawals.iw_process_by')
                    ->join('admins','admins.id','income_withdrawals.iw_approve_by')


        ->where(function($query) {
            $query->from('income_withdrawals')
                    ->where('income_withdrawals.iw_temp',11);
    })->get();

}

protected function withdrawal_get_request($id) {

 $data = IncomeWithdrawModel::Join('bank_accounts','bank_accounts.id','income_withdrawals.iw_withdraw_bank_account_id')
        ->join('bank_names','bank_names.id','bank_accounts.account_bank_id')
            ->join('profiles','profiles.id','income_withdrawals.iw_withdraw_profid')
                ->join('temp_status','temp_status.id','income_withdrawals.iw_temp')

        ->where(function($query) use($id) {
            $query->from('income_withdrawals')
                    ->where('income_withdrawals.iw_id',$id)
                    ->whereIn('income_withdrawals.iw_temp',[8,9,10]);
    })->first();
 
        return response()->json(['data' => $data]);

    }

protected function withdrawal_validate(Request $request) {

   IncomeWithdrawModel::where( function($query) use($request) {
        $query->from('income_withdrawals')
            ->where('iw_id',$request->iw)->update(['iw_temp' => 9]);
    });

    return redirect()->back()->withSuccess('Request Successfully validate. ');
}

protected function withdrawal_validate_update(Request $request) {

   IncomeWithdrawModel::where( function($query) use($request) {
        $query->from('income_withdrawals')
            ->where('iw_id',$request->iw)->update(['iw_temp' => 11,
                'iw_reference_no' => $request->receiptno,'iw_approve_by'=>Auth::user()->id,'iw_updated_at'=> now()]);
    });

    return redirect()->back()->withSuccess('Request Successfully validated. ');
}

}
