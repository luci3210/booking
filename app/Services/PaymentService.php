<?php

namespace  App\Services;
use App\Services\SecurityServices;


use App\user\StatusPaymentModel;
use App\user\PaymentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

use App\Model\Merchant\TourModel;
use App\Model\Merchant\HotelModel;

Class PaymentService extends SecurityServices{

    public function SavePayment($id,$pmStatus,$from,$to,$amount,$childrenCount)
    {
        try {
            $user = Auth::user();
            $data['pm_user_id'] = $user->id;
            $data['pm_page_id'] = $this->clean_input((int)$id);
            $data['pm_payment_status'] = $this->clean_input($pmStatus);
            $data['pm_book_date'] = $from;
            $data['pm_book_date_to'] = $to;
            $data['pm_book_amount'] = $amount;
            // $data['pm_child_count'] = $childrenCount;
            $data['pm_created_at'] = $this->getDatetimeNow();
            $data['pm_id'] = PaymentModel::insertGetId($data); // save
            $data['user_email'] = $user->email;
            $data['user_number'] = $user->pnumber;
            $data['user_fname'] = $user->fname;
            $data['user_lname'] = $user->lname;
            $data['pm_created_at'] = null;
            $data['pm_book_date'] = strtotime($from);
            $data['pm_book_date_to'] = strtotime($to);

            // $bookdate = '2025-09-23 14:44:00';
            // date("Y-m-d H:i:s", 1624084625);
            // return strtotime($d);

            $data = base64_encode(json_encode($data));
            return $data;
        } catch (\Exception $e) {
            return $e;
        }
      
    }
    
    public function getBookDetails($id,$type)
    {
        if($type == 'hotel'){
            $tourDetails = new TourModel();
            $tourDetails = $tourDetails->where('id', $id);
            $tourDetails = $tourDetails->get();
            $data['name'] = $tourDetails[0]['tour_name'];
            $data['desc'] = $tourDetails[0]['roomdesc'];
            $data['expect'] = $tourDetails[0]['tour_expect'];
            $data['noguest'] = $tourDetails[0]['noguest'];
            $data['nonights'] = $tourDetails[0]['nonights'];
            $data['cancel'] = $tourDetails[0]['can_refu_policy'];
            $data = base64_encode(json_encode($data));
            return $data;
        }

        if($type == 'tour'){
            $tourDetails = new TourModel();
            $tourDetails = $tourDetails->where('id', $id);
            $tourDetails = $tourDetails->get();
            $data['name'] = $tourDetails[0]['tour_name'];
            $data['desc'] = $tourDetails[0]['tour_desc'];
            $data['expect'] = $tourDetails[0]['tour_expect'];
            $data['noguest'] = $tourDetails[0]['noguest'];
            $data['cancel'] = $tourDetails[0]['can_refu_policy'];
            $data = base64_encode(json_encode($data));
            return $data;
        }
        return [];
        
    }

    public function updatePayment($id,$statusID)
    {
        if(empty($id) || empty($statusID)){
            return 'no reference found';
        }
        $paymentData = PaymentModel::Where('pm_id', $id)
        ->update(["pm_ps_id"=>$statusID]);

        return 'success';

    }

    public function updatePaymentStatus(Request $req,$extra,$cn,$bdetails)
    {
        $sp = new StatusPaymentModel();
        $sp = $sp->where('ps_ref_no',$req->ref_no)->get();
        if(count($sp) <= 0){
            $data['ps_merchant_id'] = $req->merchant_id;
            $data['ps_traxion_id'] = $req->traxion_id;
            $data['ps_merchant_ref_no'] = $req->merchant_ref_no;
            $data['ps_ref_no'] = $req->ref_no;
            $data['ps_payment_status'] = $req->status;
            $data['ps_reason'] = $req->reason;
            $data['ps_secure_hash'] = $req->secure_hash;
            $data['ps_description'] = $req->description;
            $data['ps_extra_data'] = $req->extra_data;
            $data['ps_payment_code'] = $req->payment_code;
            $data['ps_payment_method'] = $req->payment_method;
            $data['ps_created_at'] = $this->getDatetimeNow();
            $data['ps_temp_status'] = 1;
            $data['ps_id'] = StatusPaymentModel::insertGetId($data); // save
            $this->updatePayment($extra['pm_id'],$data['ps_id']);
        }else{
            $paymentStatus = StatusPaymentModel::Where('ps_ref_no', $req->ref_no)
            ->update( [ 
                'ps_merchant_id'=>$req->merchant_id,
                'ps_traxion_id'=>$req->traxion_id,
                'ps_merchant_ref_no' => $req->merchant_ref_no,
                'ps_ref_no' => $req->ref_no,
                'ps_payment_status' => $req->status,
                'ps_reason' => $req->reason,
                'ps_secure_hash' => $req->secure_hash,
                'ps_description' => $req->description,
                'ps_extra_data' => $req->extra_data,
                'ps_payment_code' => $req->payment_code,
                'ps_payment_method' => $req->payment_method,
                'ps_updated_at' => $this->getDatetimeNow(),
            ]);
            $this->updatePayment($extra['pm_id'],$sp[0]['ps_id']);
        }

        $statusPayment['ref_no'] = $req->ref_no;
        $statusPayment['description'] = $req->description;
        $statusPayment['payment_status'] = $req->status;
        $statusPayment['payment_method'] = $req->payment_method;
        $statusPayment = base64_encode(json_encode($statusPayment));
        $extraData = base64_encode(json_encode($extra));
        $details = [
            'title'=> 'Receipt',
            'body'=>'thank you for purchasing thru Tourismo',
            'url'=>'https://133e9cbc5b16.ngrok.io/booking/public/invoice/download?',
            //'url'=>'https://ngrok.io/booking/public/invoice/download?',
            // 'url'=>'https://87339769cc6b.ngrok.io/booking/public/invoice/download?',
            // 'url'=>'https://133e9cbc5b16.ngrok.io/booking/public/invoice/download?',
            // 'url'=>'https://booking.tourismo.ph.ngrok.io/booking/public/invoice/download?',

            'extra'=>$extraData,
            'status'=>$statusPayment,
            'profileID'=>$cn,
            'bdetails'=>$bdetails
        ];
        Mail::to($extra['user_email'])->send( new TestMail($details) );
        return 'payment';
    }



}