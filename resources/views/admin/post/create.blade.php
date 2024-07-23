@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <h1>New post:</h1>
        <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
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
            <div class="form-group w-75">
                <label for="exampleInputFile">Create main image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="main_image">
                        <label class="custom-file-label">Choose image</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @error('main_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group w-75">
                <label for="exampleInputFile">Create preview</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="preview_image">
                        <label class="custom-file-label">Choose image</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                @error('preview_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group w-25">
                <label>Select category</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ (old('category_id') == $category->id) ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create post</button>
            </div>
        </form>
    </div>
@endsection
