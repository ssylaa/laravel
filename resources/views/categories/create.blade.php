@extends('layouts.app')

@section('content')
<div class="container">
    <h1></h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add New Category</button>
    </form>
</div>
@endsection
