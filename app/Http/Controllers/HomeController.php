<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __invoke()
  {
    $categoryNames = ['HOT DEALS', 'BUSINESS', 'FICTION'];

    $categories = Category::all()
      ->whereIn('name', $categoryNames)
      ->keyBy('name');

    $homeCategories = [
      $categories->get('HOT DEALS'),
      $categories->get('BUSINESS'),
      $categories->get('FICTION'),
    ];

    return view('pages.home', compact('homeCategories'));
  }
}
