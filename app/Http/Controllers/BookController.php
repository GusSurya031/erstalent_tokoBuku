<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('user.pages.book', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->file('image'));

        if ($request->hasFile('image')) {
            $validatedData = $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg|max:1024', // Validasi file harus JPEG, PNG, atau JPG, dengan maksimal ukuran 1MB (1024 KB)
            ], [
                'image.required' => 'Tolong lampirkan file anda.',
                'image.mimes' => 'Jenis file yang anda lampirkan tidak diterima. Tolong lampirkan file dengan format yang sesuai (jpeg, png, jpg).',
                'image.max' => 'Ukuran file tidak boleh lebih dari 1MB.',
            ]);

            $image = $request->file('image');

            // Generate nama unik untuk file
            $filename = time() . '_' . $image->getClientOriginalName();

            // Simpan file ke direktori yang sesuai
            $path = $image->storeAs('public/book-cover', $filename);

            // Update URL gambar di user model
            $image_url = Storage::url($path);
        }

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:200',
            'author' => 'required|max:100',
            'publisher' => 'required|max:100',
            'summary' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        Book::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'summary' => $request->summary,
            'price' => $request->price,
            'stock' => $request->stock,
            'image_url' => $image_url,
        ]);
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        $book = Book::find($book->id);
        return view('user.pages.bookShow', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:200',
            'author' => 'required|max:100',
            'publisher' => 'required|max:100',
            'summary' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer'
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
