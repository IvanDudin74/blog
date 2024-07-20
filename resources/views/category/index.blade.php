@extends('layouts.main')
@section('content')
    <div class="container">
        @foreach($categories as $category)
            <div class="mb-3">
                <a href="{{ route('category.edit', $category->id) }}">{{ $category->title }}</a>
            </div>
        @endforeach
    </div>
@endsection
