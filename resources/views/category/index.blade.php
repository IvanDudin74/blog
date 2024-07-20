@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('category.create') }}">Create new category</a>
        </div>
        @foreach($categories as $category)
            <div class="mb-3">
                <a href="{{ route('category.edit', $category->id) }}">{{ $category->title }}</a>
            </div>
        @endforeach
    </div>
@endsection
