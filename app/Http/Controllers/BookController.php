<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
  public function show(Book $book)
  {
    return $book;
    return view('book-page', compact('book'));
    // TODO: MAKE BOOK PAGE, YOU NEED TO ENSURE IS THIS $books WORK OR NO
  }
}
