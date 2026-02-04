<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function view()
    {
        $books = Book::paginate(10);
        return view('admin.book.view', compact('books'));
    }

    public function save(Request $request)
{
    $rules = [
        'name' => 'required|max:255',
        'description' => 'nullable|string',
        'regular_price' => 'required|numeric',
        'sale_price' => 'required|numeric',
        'rating' => 'nullable|numeric|min:0|max:5',
        'status' => 'required|boolean',
    ];

     if (empty($request->book_id)) {
        $rules['image'] = 'required|image|mimes:jpg,png,jpeg';
    } elseif ($request->hasFile('image')) {
        $rules['image'] = 'image|mimes:jpg,png,jpeg';
    }

    $request->validate($rules);

    if (!empty($request->book_id)) {
        $book = Book::findOrFail($request->book_id);
        $message = 'Book updated successfully';
    } else {
        $book = new Book();
        $message = 'Book created successfully';
    }

    $book->name = $request->name;
    $book->regular_price = $request->regular_price;
    $book->sale_price = $request->sale_price;
    $book->description = $request->description;
    $book->rating = $request->rating ?? 0;
    $book->status = $request->status;
    $book->admin_id = Auth::guard('admin')->id();

    if ($request->hasFile('image')) {

        $img = time().'_'.$request->image->getClientOriginalName();
        $request->image->storeAs('books', $img, 'public');
        $book->image = 'books/'.$img;
    } 
    $book->save();

    return response()->json([
        'success' => true,
        'message' => $message,
        'book' => $book
    ]);
}


   public function destroy(Request $request)
    {
        if (!$request->id) {
            return response()->json(['success' => false, 'message' => 'book ID is required'], 400);
        }
        $book = Book::find($request->id);
        if (!$book) {
            return response()->json(['success' => false, 'message' => 'book not found'], 404);
        }

        $book->delete();
        return response()->json(['success' => true, 'message' => 'Book deleted successfully']);
    }

}

