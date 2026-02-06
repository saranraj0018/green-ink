<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
   public function store(Request $request)
   {
         $books = Book::where('status', 1)
                     ->orderBy('created_at', 'desc')
                     ->take(8)  
                     ->get();

        return view('store.main', compact('books'));
   }
}
