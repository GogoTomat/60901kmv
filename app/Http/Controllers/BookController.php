<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('books', ['books'=>Book::paginate($perpage)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book_create', [
            'genres' => Genre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'author_id' => 'required|integer',
            'name' => 'required|unique:books|max:255',
            'genre_id' => 'integer'
        ]);
        $book = new Book($validated);
        $book->save();
        return redirect('/books')->with('success', 'книга создана!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('book_edit', [
            'book' =>Book::all()->where('id', $id)->first(),
            'genres' => Genre::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'genre_id'=> 'integer'
        ]);
        $book = Book::all()->where('id', $id)->first();
        $book->name = $validated['name'];
        $book->save();
        return redirect('/books')->with('success', 'книга изменена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect('/books')->with('success', 'Книга удалена!');
    }
}
