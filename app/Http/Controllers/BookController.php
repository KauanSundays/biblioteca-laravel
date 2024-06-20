<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('welcome', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'required|url',
        ]);

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'is_favorite' => $request->has('is_favorite'),
        ]);

        return redirect()->route('books.index');
    }

    public function toggleFavorite(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->is_favorite = !$book->is_favorite;
        $book->save();
    }
}
