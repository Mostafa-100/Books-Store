<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
  public function show(Book $book)
  {
    $categories = Category::all();
    return view('book-page', compact('book', 'categories'));
  }
}
