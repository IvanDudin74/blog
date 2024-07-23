@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <form class="mb-3" action="{{ route('admin.post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection