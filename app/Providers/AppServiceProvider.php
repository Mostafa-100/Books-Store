<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    View::share('categories', Category::all());

    Password::defaults(function () {
      $rule = Password::min(7)->letters()->mixedCase()->numbers()->symbols();
      return $rule;
    });
  }
}
