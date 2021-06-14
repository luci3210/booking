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
        return view('verification.resend_email_form');
        
    }

    public function resendEmailVerification(Request $req)
    {
        $this->validateResendRequest($req);
        $user = user::where('email',$req->email)->first();
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
