<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function show(Category $category)
  {
    $categories = Category::all();
    return view('category-page', compact('category', 'categories'));
  }
}
