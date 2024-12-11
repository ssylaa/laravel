<?php

namespace App\Http\Controllers;

use App\Models\Book; // Ubah dari Books menjadi Book
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{public function index()
    {
        // Ambil data buku dari database
        $books = Book::with('category')->get();
    
        // Kirim data ke Blade view
        return view('books.index', compact('books'));
    }
    

    public function create()
    {
       // Ambil semua kategori untuk dropdown
       $categories = Category::all();
       return view('books.create', compact('categories'));
        }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
    $request->validate([
        'name' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id', // pastikan ID kategori ada
        ]);
        

        // Membuat buku baru berdasarkan data yang dikirimkan
    Book::create($request->all());

    // Menambahkan pesan sukses
    return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    // Fungsi lainnya seperti edit, update, destroy, dll.

    // App\Http\Controllers\BooksController.php

public function edit($id)
{
    $book = Book::findOrFail($id); // Ambil data buku berdasarkan ID
    $categories = Category::all(); // Ambil semua kategori

    return view('books.edit', compact('book', 'categories')); // Kirim ke view edit
}

// App\Http\Controllers\BooksController.php

public function update(Request $request, $id)
{
    // Validasi input form
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id', // Validasi agar category_id ada di tabel categories
        'author' => 'required|string|max:255',
    ]);

    // Cari buku berdasarkan ID
    $book = Book::findOrFail($id);

    // Update buku dengan data baru
    $book->update([
        'name' => $request->input('name'),  // Judul buku
        'author' => $request->input('author'), // Penulis
        'category_id' => $request->input('category_id'), // Kategori
    ]);

    // Redirect ke halaman daftar buku dengan pesan sukses
    return redirect()->route('books.index')->with('success', 'Book updated successfully.');
}

// App\Http\Controllers\BooksController.php

public function destroy($id)
{
    // Cari buku berdasarkan ID
    $book = Book::findOrFail($id);

    // Hapus buku dari database
    $book->delete();

    // Redirect ke halaman daftar buku dengan pesan sukses
    return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
}

}

