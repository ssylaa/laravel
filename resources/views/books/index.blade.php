@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Judul di atas tabel -->
<div class="container">
    <div class="d-flex container mb-3">
        <h1 style="font-size: 1.5rem; text-transform: uppercase; font-family: 'Segoe UI Black'; text-align: center;">
            All Books
        </h1>
    </div>
    <a href="{{ route('books.create') }}" class="btn btn-primary">New Book</a>
</div>

<!-- Tabel Buku -->
<div class="table-responsive">
    <table class="table" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border-bottom: 1px solid #ccc;">No</th> <!-- Kolom nomor -->
                <th style="border-bottom: 1px solid #ccc;">Title</th>
                <th style="border-bottom: 1px solid #ccc;">Category</th>
                <th style="border-bottom: 1px solid #ccc;">Author</th>
                <th style="border-bottom: 1px solid #ccc;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td> <!-- Nomor urut dimulai dari 1 -->
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->author }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('books.edit', $item->id) }}" class="btn btn-edit btn-sm">
                            <i class="fas fa-edit"></i> 
                        </a>

                        <!-- Tombol Delete -->
                        <form action="{{ route('books.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete btn-sm">
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
