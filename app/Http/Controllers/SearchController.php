<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function __invoke(Request $request)
  {
    $request->validate(['keyword' => 'required']);

    $keyword = $request->keyword;

    $books = Book::where('title', 'LIKE', '%' . $keyword . '%')->get();

    return view('pages.search', compact('books', 'keyword'));
  }
}
