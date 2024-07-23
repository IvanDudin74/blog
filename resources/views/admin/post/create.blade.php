@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <h1>New post:</h1>
        <form action="{{ route('admin.post.store') }}" method="post">
            @csrf
            <div class="w-25 mb-3">
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create post</button>
            </div>

        </form>
    </div>
@endsection
