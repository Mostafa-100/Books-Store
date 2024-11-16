<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
  public function addBookToCart(Request $request)
  {
    $request->validate(['bookId' => 'required|integer|exists:books,id']);

    try {
      if (Auth::check()) {
        $cart = Auth::user()->cart ?? Cart::create(['user_id' => Auth::id()]);
        $cart->books()->syncWithoutDetaching($request->input('bookId'));

        return response()
          ->json(['status' => 'The item is added successfully', 'cart' => $cart->books]);
      } else {
        $cart = Session::get('cart') ?? [];
        if (!in_array($request->input('bookId'), $cart)) {
          Session::put('cart', [...$cart, $request->input('bookId')]);
        }

        return response()
          ->json(['status' => 'The item is added successfully', 'cart' => $cart]);
      }
    } catch (\Exception $e) {
      return response()
        ->json(['error' => 'cannot add the item in cart'], 500);
    }
  }

  public function getCart()
  {
    $cartInSession = Session::get('cart');
    $cartInDatabase = Auth::user()?->cart;

    if ($cartInSession && $cartInDatabase) {

      $cartInSessionBooks = Arr::map($cartInSession, function ($book_id) {
        return Book::find($book_id);
      });

      $cartInDatabaseBooks = $cartInDatabase->books;

      return array_merge($cartInSessionBooks, $cartInDatabaseBooks);
    } else if ($cartInSession) {

      $cartInSessionBooks = Arr::map($cartInSession, function ($book_id) {
        return Book::find($book_id);
      });

      return $cartInSessionBooks;
    } else if ($cartInDatabase) {

      return $cartInDatabase->books;
    } else {
      return response()
        ->json(['status' => 'cart is empty', 'cart' => []]);
    }
  }
}
