<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'pdf' => 'required|mimes:pdf|max:10000',
        ]);

        $path = $request->file('pdf')->store('books', 'public');

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'pdf_path' => $path,
        ]);

        return redirect()->route('books.index')->with('success', 'Libro guardado correctamente');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'pdf' => 'nullable|mimes:pdf|max:10000',
        ]);

        $data = $request->only('title', 'description');

        if ($request->hasFile('pdf')) {
            Storage::disk('public')->delete($book->pdf_path);
            $data['pdf_path'] = $request->file('pdf')->store('books', 'public');
        }

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Libro actualizado');
    }

    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->pdf_path);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Libro eliminado');
    }

    public function grid()
    {
        $books = Book::all();
        return view('books.grid', compact('books'));
    }
}
