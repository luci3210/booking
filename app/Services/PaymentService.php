<?php

namespace  App\Services;
use App\Services\SecurityServices;


use App\user\StatusPaymentModel;
use App\user\PaymentModel;
use Illuminate\Http\Request;
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

    public function updatePaymentStatus(Request $req)
    {
        $sp = new StatusPaymentModel();
        $sp->ps_merchant_id = $req->merchant_id;
        $sp->ps_traxion_id = $req->traxion_id;
        $sp->ps_merchant_ref_no = $req->merchant_ref_no;
        $sp->ps_ref_no = $req->ref_no;
        $sp->ps_payment_status = $req->status;
        $sp->ps_reason = $req->reason;
        $sp->ps_secure_hash = $req->secure_hash;
        $sp->ps_description = $req->description;
        $sp->ps_extra_data = $req->extra_data;
        $sp->ps_payment_code = $req->payment_code;
        $sp->ps_payment_method = $req->payment_method;
        $sp->ps_created_at = $this->getDatetimeNow();
        $sp->ps_temp_status = 1;
        $sp->save();
        return 'payment';
    }



}