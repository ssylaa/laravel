@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Judul di atas tabel -->
    <div class="container">
        <div class="d-flex container mb-3">
            <h1 style="font-size: 1.5rem; text-transform: uppercase; font-family: 'Segoe UI Black'; text-align: center;">
                Book Categories
            </h1>
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">New Category</a>
    </div>

    <!-- Tabel Kategori -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td> <!-- Nomor urut -->
                    <td>{{ $item->name }}</td> <!-- Nama kategori -->
                    <td>
                        <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-edit btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('categories.destroy', $item->id) }}" method="POST" style="display:inline;">
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
@endsection
