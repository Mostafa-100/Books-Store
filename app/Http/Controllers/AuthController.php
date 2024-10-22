<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

  public function registerUser(Request $request)
  {

    $validated = $request->validate([
      'username' => 'required|alpha_dash|min:3|max:10|unique:users,username',
      'first-name' => 'required|alpha|min:3|max:10',
      'last-name' => 'required|alpha|min:3|max:10',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:7|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/|confirmed',
      'country' => 'required|exists:countries,id',
      'address' => 'required|string|max:255|regex:/^[0-9a-zA-Z\s]+$/',
      'postal-code' => 'required|digits_between:3,7'
    ], [
      'password.regex' => 'Password must include an uppercase letter, a lowercase letter, a number, and a special character.'
    ]);

    User::create([
      'username' => $validated['username'],
      'firstName' => $validated['first-name'],
      'lastName' => $validated['last-name'],
      'email' => $validated['email'],
      'password' => Hash::make($validated['password']),
      'country_id' => $validated['country'],
      'address' => $validated['address'],
      'postalCode' => $validated['postal-code']
    ]);

    return redirect()->route('login')->with('register-success', 'Registration has been completed successfully.');
  }

  public function authenticate(Request $request)
  {
    $validated = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:7|max:20',
    ]);

    if (Auth::attempt($validated)) {
      $request->session()->regenerate();
      return redirect()->route('home')->with('login-success', 'You are now logged in.');
    } else {
      return redirect('login')->with('login-failure', 'You are not registered on the site');
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    return redirect()->route('home');
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
      ? redirect()->route('login')->with('reset-success', 'A password reset link has been sent to your email. Please check your inbox.')
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
      'password' => 'required|min:7|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/|confirmed',
    ], [
      'password.regex' => 'Password must include an uppercase letter, a lowercase letter, a number, and a special character.'
    ]);

    $status = Password::reset($validated, function (User $user, $password) {
      $user->password = Hash::make($password);
      $user->setRememberToken(Str::random(60));

      $user->save();
    });

    return $status === Password::PASSWORD_RESET
      ? redirect()->route('login')->with('reset-success', 'Your password has been successfully reset.')
      : back()->withErrors(['email' => $status]);
  }
}
