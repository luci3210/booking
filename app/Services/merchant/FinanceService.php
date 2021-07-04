<?php

namespace  App\Services\merchant;

use App\Services\SecurityServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Carbon\CarbonImmutable;



use App\user\StatusPaymentModel;
use App\user\PaymentModel;
use App\Model\Merchant\TourModel;
use App\Model\Merchant\ProfileModel;

Class FinanceService extends SecurityServices{


    public function getWeeklyIncome($id)
    {
        $tourModel = new TourModel();
        $getWeekly = $tourModel->where('service_tour.profid', $id);
        $getWeekly = $getWeekly->join('payments', 'payments.pm_page_id' , 'service_tour.id');
        $getWeekly = $getWeekly->join('status_payment', 'status_payment.ps_id', '=', 'payments.pm_ps_id');
        $getWeekly =  $getWeekly->whereBetween('status_payment.ps_created_at', [Carbon::now()->locale('en_PH')->subWeek()->format("Y-m-d H:i:s"), Carbon::now()]);
        $getWeekly = $getWeekly->sum('payments.pm_id');
        // $getWeekly = $getWeekly->get();
        // $ph = CarbonImmutable::now()->locale('en_PH')->startOfWeek()->format('Y-m-d H:i:s');
        // return $ph;
        return $getWeekly;
    }

    public function getMonthlyIncome()
    {

    }
    public function getTotalIncome()
    {

    }

    public function getMyProfile($id)
    {
        $profileModel = new ProfileModel();
        $profileModel = $profileModel->where('user_id', $id);
        $profileModel = $profileModel->first();
        return $profileModel;
    }

}