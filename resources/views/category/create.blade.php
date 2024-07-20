@extends('layouts.main')
@section('content')
    <div class="container">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
