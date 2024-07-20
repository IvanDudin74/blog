@extends('layouts.main')
@section('content')
    <div class="container">
        <form class="mb-3" action="{{ route('category.update', $category->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <form class="mb-3" action="{{ route('category.destroy', $category->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>
    </div>
@endsection
