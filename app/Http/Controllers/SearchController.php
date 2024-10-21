<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function __invoke(Request $request)
  {
    if ($request->has('keyword')) {
      $keyword = $request->keyword;
      $books = Book::where('title', 'LIKE', '%' . $keyword . '%')->get();

      if ($books->isEmpty()) {
        return redirect()->route('home')->with('searchNotFoundError', 'This book is not exist');
      } else {
        return view('search-page', compact('books', 'keyword'));
      }
    } else {
      return redirect()->current();
    }
  }
}
