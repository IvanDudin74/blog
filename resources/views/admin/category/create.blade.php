@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <h1>New category:</h1>
        <form action="{{ route('admin.category.store') }}" method="post">
            @csrf
            <div class="w-25 mb-3">
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter category">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
