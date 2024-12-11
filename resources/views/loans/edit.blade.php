@extends('layouts.app')

@section('content')
    <form action="{{ route('loans.update', $loan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select class="form-control" id="book_id" name="book_id" required>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ $book->id == $loan->book_id ? 'selected' : '' }}>
                        {{ $book->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrower" class="form-label">Borrower</label>
            <input type="text" class="form-control" id="borrower" name="borrower" value="{{ $loan->borrower }}" required>
        </div>

        <div class="mb-3">
            <label for="loan_date" class="form-label">Loan Date</label>
            <input type="date" class="form-control" id="loan_date" name="loan_date" value="{{ $loan->loan_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
