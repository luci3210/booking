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
        $startWeek = Carbon::now()->startOfWeek();
        $endWeek =  Carbon::now()->endOfWeek();
        $tourModel = new TourModel();
        // Carbon::now()->locale('en_PH')->subWeek()->format("Y-m-d H:i:s"), Carbon::now()
        $getWeekly = $tourModel->where('service_tour.profid', $id);
        $getWeekly = $getWeekly->join('payments', 'payments.pm_page_id' , 'service_tour.id');
        $getWeekly = $getWeekly->join('status_payment', 'status_payment.ps_id', '=', 'payments.pm_ps_id');
        $getWeekly =  $getWeekly->whereBetween('status_payment.ps_created_at', [$startWeek,$endWeek]);
        $getWeekly = $getWeekly->sum('payments.pm_book_amount');
        // $getWeekly = $getWeekly->get();
        // $ph = CarbonImmutable::now()->locale('en_PH')->startOfWeek()->format('Y-m-d H:i:s');
        // return $ph;
        return $getWeekly;
    }

    public function getMonthlyIncome($id)
    {
        //one day (today)
    
        $dateStart = Carbon::now()->startOfMonth()->format("Y-m-d H:i:s");

        //one month / 30 days
    
        $endDate = Carbon::now()->endOfMonth()->format("Y-m-d H:i:s");

        $tourModel = new TourModel();
        $getMonthly = $tourModel->where('service_tour.profid', $id);
        $getMonthly = $getMonthly->join('payments', 'payments.pm_page_id' , 'service_tour.id');
        $getMonthly = $getMonthly->join('status_payment', 'status_payment.ps_id', '=', 'payments.pm_ps_id');
        $getMonthly =  $getMonthly->whereBetween('status_payment.ps_created_at', [$dateStart,$endDate]);
        $getMonthly = $getMonthly->sum('payments.pm_book_amount');
        
        // $getMonthly = $getMonthly->get();
        // $ph = CarbonImmutable::now()->locale('en_PH')->startOfWeek()->format('Y-m-d H:i:s');
        // return $ph;

        return $getMonthly;


    }
    public function getTotalIncome($id)
    {

        $tourModel = new TourModel();
        $getMonthly = $tourModel->where('service_tour.profid', $id);
        $getMonthly = $getMonthly->join('payments', 'payments.pm_page_id' , 'service_tour.id');
        $getMonthly = $getMonthly->join('status_payment', 'status_payment.ps_id', '=', 'payments.pm_ps_id');
        $getMonthly = $getMonthly->sum('payments.pm_book_amount');
        // $getMonthly = $getMonthly->get();
        // $ph = CarbonImmutable::now()->locale('en_PH')->startOfWeek()->format('Y-m-d H:i:s');
        // return $ph;
        return $getMonthly;

    }

    public function getMyProfile($id)
    {
        $profileModel = new ProfileModel();
        $profileModel = $profileModel->where('user_id', $id);
        $profileModel = $profileModel->first();
        return $profileModel;
    }

}