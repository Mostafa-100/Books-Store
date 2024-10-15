<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __invoke()
  {
    $categories = Category::pluck('name');
    $books = Book::all();
    return view('home', compact('categories', 'books'));
  }
}
