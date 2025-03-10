<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
      'username' => 'required|alpha_dash|min:3|max:30',
      Rule::unique('users', 'username')->ignore(auth()->id()),
      'first_name' => 'required|alpha|min:3|max:10',
      'last_name' => 'required|alpha|min:3|max:10',
      'email' => 'required|email',
      Rule::unique('users', 'email')->ignore(auth()->id()),
      'country_id' => 'required|exists:countries,id',
      'address' => 'required|string|max:255|regex:/^[0-9a-zA-Z\s]+$/',
      'postal_code' => 'required|digits_between:3,7'
    ]);

    try {

      auth()->user()->update($validated);

      return to_route('users.show')->with('update-success', 'update has been completed successfully.');
    } catch (\Exception $e) {
      return to_route('users.show')
        ->withInput()
        ->withErrors([
          'update.error' => 'There was a problem with update your data. Please try again.'
        ]);
    }
  }
}
