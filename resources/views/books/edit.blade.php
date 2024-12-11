@extends('layouts.app') <!-- Ensure it uses the same layout -->

@section('content')
    <div class="container">
        <!-- Empty heading for spacing -->
        <h1></h1>

        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Book edit form -->
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT for updating data -->

            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="name" id="name" value="{{ old('name', $book->name) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
          <!-- Submit button to add the new book -->
        <button type="submit" class="btn btn-primary mt-3">Add New Book</button>
      </form>
    </div>
@endsection
