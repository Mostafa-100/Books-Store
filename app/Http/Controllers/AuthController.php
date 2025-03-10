<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as Pass;

class AuthController extends Controller
{
  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function showRegisterForm()
  {
    $countries = Country::all();
    return view('auth.register', compact('countries'));
  }

  public function guestRegister(Request $request)
  {

    $validated = $request->validate([
      'username' => 'required|alpha_dash|min:3|max:10|unique:users,username',
      'first_name' => 'required|alpha|min:3|max:10',
      'last_name' => 'required|alpha|min:3|max:10',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:7|max:20',
      Pass::defaults(),
      'country_id' => 'required|exists:countries,id',
      'address' => 'required|string|max:255',
      'postal_code' => 'required|digits_between:3,7'
    ]);

    $validated['password'] = Hash::make($validated['password']);

    try {
      $user = User::create($validated);

      return to_route('login')->with(
        'register.success',
        'Registration has been completed successfully.'
      );
    } catch (\Exception) {
      return to_route('register')
        ->withErrors([
          'register.error' => 'There was a problem with the registration. Please try again.'
        ])->withInput();
    }
  }

  public function authenticate(Request $request)
  {
    $validated = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:7|max:20',
    ]);

    if (Auth::attempt($validated)) {
      $request->session()->regenerate();
      return to_route('home')->with('login.success', 'You are now logged in.');
    } else {
      return back()->with('login.failure', 'You are not registered on the site');
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    return to_route('home');
  }

  public function forgotPasswordRequest()
  {
    return view('auth.forgot-password');
  }

  public function forgotPasswordResponse(Request $request)
  {
    $request->validate([
      'email' => 'required|email'
    ]);

    $status = Password::sendResetLink(
      $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
      ? to_route('login')->with('reset-success', 'A password reset link has been sent to your email. Please check your inbox.')
      : back()->withErrors(['email' => $status]);
  }

  public function showResetPassword(Request $request, $token)
  {
    return view('auth.password-reset', ['token' => $token, 'email' => $request->email]);
  }

  public function resetPassword(Request $request)
  {
    $validated = $request->validate([
      'token' => 'required',
      'email' => 'required|email',
      'password' => 'required|min:7|max:20',
      Pass::defaults(),
    ]);

    $status = Password::reset($validated, function (User $user, $password) {
      $user->password = Hash::make($password);
      $user->setRememberToken(Str::random(60));

      $user->save();
    });

    return $status === Password::PASSWORD_RESET
      ? to_route('login')->with('reset.success', 'Your password has been successfully reset.')
      : back()->withErrors(['email' => $status]);
  }
}
