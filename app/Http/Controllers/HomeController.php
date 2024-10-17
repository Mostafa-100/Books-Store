<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function __invoke()
  {
    $books = Book::all();
    return view('home', compact('books'));
  }
}
