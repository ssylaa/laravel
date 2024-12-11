<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan; // Pastikan ini ada
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function create()
{
    $books = Book::all(); // Ambil semua data buku
    return view('loans.create', compact('books')); // Kirim data buku ke view
}

public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'book_id' => 'required|exists:books,id',
        'borrower' => 'required|string|max:255',
        'loan_date' => 'required|date',
        'return_date' => 'nullable|date|after_or_equal:loan_date',
    ]);

    // Simpan data ke database
    Loan::create([
        'book_id' => $request->book_id,
        'borrower' => $request->borrower,
        'loan_date' => $request->loan_date,
        'return_date' => $request->return_date,
    ]);

    // Redirect setelah berhasil
    return redirect()->route('loans.index')->with('success', 'Loan added successfully.');
}

    public function index()
    {
        // Ambil semua data peminjaman, termasuk informasi buku
    $loans = Loan::with('book')->latest()->get();

    // Kirim data ke view
    return view('loans.index', compact('loans'));  }

    public function edit($id)
{
    $loan = Loan::findOrFail($id); // Menampilkan data peminjaman
    $books = Book::all(); // Ambil semua buku untuk pilihan
    return view('loans.edit', compact('loan', 'books'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'book_id' => 'required|exists:books,id',
        'borrower' => 'required|string',
        'loan_date' => 'required|date',
    ]);

    $loan = Loan::findOrFail($id);
    $loan->update([
        'book_id' => $request->book_id,
        'borrower' => $request->borrower,
        'loan_date' => $request->loan_date,
    ]);

    return redirect()->route('loans.index')->with('success', 'Loan updated successfully.');
}
public function destroy($id)
{
    $loan = Loan::findOrFail($id);
    $loan->delete();

    return redirect()->route('loans.index')->with('success', 'Loan deleted successfully.');
}

// ⚠️kalau eror hapus dari sini⚠️

  // Menampilkan form pengembalian buku
  public function returnBookForm(Loan $loan)
  {
      return view('loans.return', compact('loan'));
  }

  // Menangani pengembalian buku
  public function returnBook(Request $request, Loan $loan)
  {
      // Validasi
      $request->validate([
          'return_date' => 'required|date',
      ]);

      // Update status dan tanggal pengembalian
      $loan->update([
          'return_date' => $request->return_date,
          'status' => 'Returned', // Status baru
      ]);

      return redirect()->route('loans.index')->with('success', 'Buku berhasil dikembalikan!');
  }
}
