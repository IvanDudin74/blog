@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="mb-3">
            {{ $category->id }}. {{ $category->title }}
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.category.edit', $category->id) }}">Edit category</a>
        </div>
        <form class="mb-3" action="{{ route('admin.category.destroy', $category->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>
    </div>
@endsection
