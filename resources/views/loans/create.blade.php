@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('loans.store') }}">
        @csrf

        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select class="form-control" id="book_id" name="book_id" required>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrower" class="form-label">Borrower</label>
            <input type="text" class="form-control" id="borrower" name="borrower" required>
        </div>

        <div class="mb-3">
            <label for="loan_date" class="form-label">Loan Date</label>
            <input type="date" class="form-control" id="loan_date" name="loan_date" required>
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Return Date</label>
            <input type="date" class="form-control" id="return_date" name="return_date">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

@endsection
