<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
  public function show(Book $book)
  {
    return view('pages.book', compact('book'));
  }
}
