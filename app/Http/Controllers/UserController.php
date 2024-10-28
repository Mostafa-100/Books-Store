<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function show()
  {
    $currentUserData = Auth::user()->only([
      'username',
      'first_name',
      'last_name',
      'email',
      'address',
      'postal_code',
    ]);

    $currentUserData['country'] = Auth::user()->country->name;

    $countries = Country::all();

    return view('user.profile', compact('currentUserData', 'countries'));
  }

  public function edit(Request $request)
  {
    $user = Auth::user();
    $countries = Country::all();
    return view('user.edit', compact('user', 'countries'));
  }

  public function update(Request $request)
  {
    $validated = $request->validate([
      'username' => 'required|alpha_dash|min:3|max:10|unique:users,username',
      'first_name' => 'required|alpha|min:3|max:10',
      'last_name' => 'required|alpha|min:3|max:10',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:7|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/|confirmed',
      'country_id' => 'required|exists:countries,id',
      'address' => 'required|string|max:255|regex:/^[0-9a-zA-Z\s]+$/',
      'postal_code' => 'required|digits_between:3,7'
    ], [
      'password.regex' => 'Password must include an uppercase letter, a lowercase letter, a number, and a special character.'
    ]);

    $validated['password'] = Hash::make($validated['password']);

    // TODO: update the user
    try {
      User::create($validated);

      return to_route('login')->with('register-success', 'Registration has been completed successfully.');
    } catch (\Exception $e) {
      return to_route('register')
        ->withErrors([
          'register.error' => 'There was a problem with the registration. Please try again.'
        ])->withInput();
    }
  }
}
