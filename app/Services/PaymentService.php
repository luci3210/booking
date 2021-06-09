<?php

namespace  App\Services;
use App\Services\SecurityServices;


use App\user\StatusPaymentModel;
use App\user\PaymentModel;
use Illuminate\Support\Facades\Auth;





Class PaymentService extends SecurityServices{

    public function SavePayment($id,$pagename,$pmStatus,$status)
    {
        $pm =  new PaymentModel();

        $pm->pm_user_id = Auth::user()->id;
        $pm->pm_page_name = $this->clean_input($pagename);
        $pm->pm_page_id = $this->clean_input((int)$id);
        $pm->pm_payment_status = $this->clean_input($pmStatus);
        $pm->pm_created_at = $this->getDatetimeNow();
        $pm->pm_temp_status = $status;
        $pm->save();

    }

    public function updatePaymentStatus()
    {
        $sp = new StatusPaymentModel();
        $sp->ps_payment_code = 'asdsadsadsa';
        $sp->ps_payment_status = 'updaasdasdsate';
        $sp->save();
        return 'payment';
    }



}