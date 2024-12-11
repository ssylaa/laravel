@extends('layouts.app')  <!-- Connect to the main layout -->

@section('title', 'Add New Book')  <!-- Page title displayed in the browser tab -->

@section('content')  <!-- Main content section -->

    <!-- Form to add a new book -->
    <form action="{{ route('books.store') }}" method="POST" class="form-container">
        @csrf
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit button to add the new book -->
        <button type="submit" class="btn btn-primary mt-3">Add New Book</button>
    </form>

@endsection
