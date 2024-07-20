@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('tag.create') }}">Create new tag</a>
        </div>
        @foreach($tags as $tag)
            <div class="mb-3">
                <a href="{{ route('tag.edit', $tag->id) }}">{{ $tag->title }}</a>
            </div>
        @endforeach
    </div>
@endsection
