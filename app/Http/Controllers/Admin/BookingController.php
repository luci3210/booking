<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\user\StatusPaymentModel;

use App\Model\PaymentModel;
use App\Model\Admin\ProductModel;


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
    public function index() {

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

public function confirm_booking() {

    $data = $this->data_booking();

    if(count($data) > 0) {
        return view('admin.booking.confirm_booking',compact('data'));
    } else {
        return view('admin.booking.confirm_bookingNotFount');
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




    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
