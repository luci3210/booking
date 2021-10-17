<?php

namespace App\Http\Controllers\email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\TestMail;

class MailSendController extends Controller
{
    //

    public function mailsend()
    {
        $details = [
            'title'=> 'Receipt',
            'body'=>'test sending'
        ];
        Mail::to('hanscarreon0898@gmail.com')->send( new TestMail($details) );
        return view('emails.thanks');
    }
    

    public function receipt_sneder($details,$to)
    {

    }
}
