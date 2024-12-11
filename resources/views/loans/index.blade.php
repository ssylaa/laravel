@extends('layouts.app')

@section('content')

    <!-- Title above the table -->
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    
    <div class="container">
        <div class="d-flex container mb-3">
            <h1 style="font-size: 1.5rem; text-transform: uppercase; font-family: 'Segoe UI Black'; text-align: right;">
                Loan Records
            </h1>
        </div>
        <a href="{{ route('loans.create') }}" class="btn btn-primary">Add Loan</a>
    </div>
    
    <!-- Tabel Buku -->
    <div class="table-responsive">
        <table class="table" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border-bottom: 1px solid #ccc;"></th> <!-- Garis tipis di bawah header -->
                    <th style="border-bottom: 1px solid #ccc;">Title</th>
                    <th style="border-bottom: 1px solid #ccc;">Borrower</th>
                    <th style="border-bottom: 1px solid #ccc;">Loan Date</th>
                    <th style="border-bottom: 1px solid #ccc;">Return Date</th>
                    <th style="border-bottom: 1px solid #ccc;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $loan->book ? $loan->book->name : 'Unknown' }}</td> <!-- Menampilkan judul buku -->
                        <td>{{ $loan->borrower }}</td>  <!-- Nama peminjam -->
                        <td>{{ $loan->loan_date }}</td> <!-- Tanggal pinjam -->
                        <td>{{ $loan->return_date ?? 'Not Defined' }}</td> <!-- Tanggal kembali atau jika tidak ada -->
                        <td>
                            <!-- Tombol Edit dengan Warna Kustom -->
                            <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-edit btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Tombol Delete dengan Warna Kustom -->
                            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
