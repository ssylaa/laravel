@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Form Pengembalian Buku</h1>

    <!-- Notifikasi -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Informasi Buku -->
    <div class="mb-4">
        <h3>Detail Pinjaman</h3>
        <p><strong>Judul Buku:</strong> {{ $loan->book->title }}</p>
        <p><strong>Peminjam:</strong> {{ $loan->user->name }}</p>
        <p><strong>Tanggal Pinjam:</strong> {{ $loan->loan_date }}</p>
        <p><strong>Jatuh Tempo:</strong> {{ $loan->due_date }}</p>
    </div>

    <!-- Form Pengembalian -->
    <form action="{{ route('loans.return.submit', $loan->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="return_date" class="form-label">Tanggal Pengembalian</label>
            <input type="date" name="return_date" id="return_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
    </form>
</div>
@endsection
