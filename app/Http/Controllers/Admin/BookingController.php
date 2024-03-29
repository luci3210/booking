<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\user\StatusPaymentModel;
//use App\user\PaymentModel;

use App\Model\PaymentModel;
use App\Model\IncomeModel;
use App\Model\ChargesModel;
use App\Model\Admin\ProductModel;

use App\Http\Requests\AdminPostConfirm;


class BookingController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

protected function data_booking() {

        return $data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
            ->join('service_tour','service_tour.id','payments.pm_page_id')
                ->join('products','products.id','service_tour.service_id')

        ->where( function($query) {
            $query->from('status_payment');
                   // ->whereDate('payments.pm_created_at',date('Y-m-d'));
        })->get();

    }
protected function index() {

        $data = $this->data_booking();

        if(count($data) > 0) {
            return view('admin.booking.show_booking',compact('data'));
        } else {
            return view('admin.booking.show_bookingNotFount');
        }
    }

protected function data_confirm_booking() {

    return $data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
        ->join('service_tour','service_tour.id','payments.pm_page_id')
            ->join('products','products.id','service_tour.service_id')

    ->where( function($query) {
        $query->from('status_payment')
               ->whereDate('payments.pm_created_at',date('Y-m-d'));
    })->get();

}

protected function confirm_booking() {

    $data = $this->data_booking();

    if(count($data) > 0) {
        return view('admin.booking.confirm_booking',compact('data'));
    } else {
        return view('admin.booking.confirm_bookingNotFount');
    }
}


protected function execute_booking() {

    $data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
        ->join('service_tour','service_tour.id','payments.pm_page_id')
            ->join('products','products.id','service_tour.service_id')
                ->join('charges_date','charges_date.chg_ps_id','payments.pm_ps_id')

    ->where( function($query) {
        $query->from('status_payment')
            ->where('payments.pm_temp_status',6);
                // ->whereDate('charges_date.chg_date','>=',date('Y-m-d'));
    })->get();


    if(count($data) > 0) {
        return view('admin.booking.execute_booking',compact('data'));
    } else {
        return view('admin.booking.execute_bookingNotFound');
    }
}

protected function execute_this_booking($pm_id) {

    $data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
        ->join('service_tour','service_tour.id','payments.pm_page_id')
            ->join('products','products.id','service_tour.service_id')
                ->join('charges_date','charges_date.chg_ps_id','payments.pm_ps_id')
                    ->join('users','users.id','payments.pm_user_id')
                        ->join('profiles','profiles.id','charges_date.chg_prf_id')
                            ->join('charges','charges.chrg_product_id','service_tour.service_id')

    ->where( function($query) use($pm_id) {
        $query->from('status_payment')
            ->where('payments.pm_id',$pm_id)
            ->where('payments.pm_temp_status',6);
                // ->whereDate('charges_date.chg_date','>=',date('Y-m-d'));
    })->get();


    if(count($data) > 0) {
        return view('admin.booking.execute_details',compact('data'));
    } else {
        return view('admin.booking.execute_bookingNotFound');
    }
}

public function execute_confirm(AdminPostConfirm $request, $pm_id) {

     $data = StatusPaymentModel::join('payments','payments.pm_ps_id','status_payment.ps_id')
        ->join('service_tour','service_tour.id','payments.pm_page_id')
            ->join('products','products.id','service_tour.service_id')
                ->join('charges_date','charges_date.chg_ps_id','payments.pm_ps_id')
                    ->join('users','users.id','payments.pm_user_id')
                        ->join('profiles','profiles.id','charges_date.chg_prf_id')
                            ->join('charges','charges.chrg_product_id','service_tour.service_id')

    ->where( function($query) use($pm_id) {
        $query->from('status_payment')
            ->where('payments.pm_id',$pm_id)
            ->where('charges_date.chg_temp',6);
                // ->whereDate('charges_date.chg_date','>=',date('Y-m-d'));
    })->get();

        if($data[0]->pm_id == $pm_id) {

            $tourismo_income = ($data[0]->pm_book_amount / 100) * $data[0]->chrg_value;
            
            $income =IncomeModel::firstOrCreate([
            
                'mi_paid_amount' =>$data[0]->pm_book_amount,
                'mi_tourismo_charge' => $data[0]->chrg_value,
                'mi_tourismo_income' => $tourismo_income,
                'mi_merchant_income' => $data[0]->pm_book_amount - $tourismo_income,
                'mi_payment_id' => $data[0]->pm_id,
                'mi_payment_status_id' => $data[0]->ps_id,
                'mi_merchant_prof_id' => $data[0]->id
            
            ]);

            $income->save();

            PaymentModel::where( function($query) use($pm_id) {
                $query->from('payments')
            ->where('payments.pm_id',$pm_id)->update(['payments.pm_temp_status' => 7]);
    });
            return redirect()->back()->withSuccess('Execute charges successfully confirm.');

        } else {

            return redirect()->back()->withSuccess('Execute faild.');
        }


    }



public function show_data_search_booking(Request $request) {

        $data = PaymentModel::join('service_tour','service_tour.id','payments.pm_page_id')
            ->join('products','service_tour.service_id','products.id')
                        ->join('status_payment','status_payment.ps_id','payments.pm_ps_id')

->select('products.name AS pname',
                'service_tour.tour_name',
                    'payments.pm_created_at','payments.pm_book_date','payments.pm_book_date_to',
                    'payments.pm_book_amount','payments.pm_id',
                            'status_payment.ps_ref_no')

            ->where( function($query) use($request){
                $query->from('payments')
                    ->whereIn('payments.pm_payment_status',['success','pending'])
                        ->whereDate('pm_created_at', '<=', $request->dfrom)
                        ->whereDate('pm_created_at', '>=', $request->dto)
->whereDate('pm_book_date_to', '>',date('Y-m-d', strtotime('pm_book_date_to'.' + 3 days'))); 

                    })

            
                ->get();   

        return view('admin.booking.show_booking',compact('data'));
    }

   public function execute_date($id) {

        $products = PaymentModel::join('service_tour','service_tour.id','payments.pm_page_id')
            ->join('products','service_tour.service_id','products.id')
                        ->join('status_payment','status_payment.ps_id','payments.pm_ps_id')
                            ->join('charges','charges.chrg_product_id','service_tour.service_id')

        ->where(function($query) use($id) {

            $query->from('payments')->where('pm_id', $id);
        
        })->first();

        return response()->json(['data' => $products]);

    }

}
