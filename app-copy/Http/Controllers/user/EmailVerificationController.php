<?php

namespace App\Http\Controllers\user;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Events\Auth\UserRegistered;


class EmailVerificationController extends Controller
{
    //

    public function showResendForm(Request $req)
    {
        $data = $req->query('data');
        $data = base64_decode($data);
        return view('verification.resend_email_form', compact('data'));
        
    }

    public function resendEmailVerification(Request $req)
    {
        $this->validateResendRequest($req);
        $user = user::where('email',$req->email)->first();
        if($user['email_verified_at']){

        return redirect()->back()->withErrors(['email'=>'email already verified']);
        }
        $user->sendEmailVerificationNotification();
        return redirect()->back()->withSuccess('Email activation has been resent.');

    }

    protected function validateResendRequest(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'This email is not exists. Please check your email.'
        ]);
    }
}
