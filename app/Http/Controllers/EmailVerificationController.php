<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
  public function sendEmailVerification()
  {
    event(new Registered(Auth::user()));
    return to_route('users.show')
      ->with('email.sent', 'Check your email');
  }

  public function verify(EmailVerificationRequest $request)
  {
    $request->fulfill();
    try {
      return to_route('users.show')->with('verify.success', 'Your email is verified');
    } catch (\Exception) {
      return to_route('users.edit')
        ->withErrors('There was a problem with the email verification, please try again later.')
        ->withInput();
    }
  }
}
