<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function __invoke(Request $request)
  {
    $request->validate(['keyword' => 'required']);

    $books = Book::where('title', 'LIKE', '%' . $request->keyword . '%')->get();

    return view('pages.search', compact('books', 'keyword'));
  }
}
