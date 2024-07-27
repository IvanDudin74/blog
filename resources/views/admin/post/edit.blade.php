@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">categories</a></li>
                            <li class="breadcrumb-item active">edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <form action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="w-25 mb-3">
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="Enter title">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-5">
                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="w-25">
                <img src="{{ asset('storage/'.$post->main_image) }}" alt="main_image" class="w-75">
            </div>
            <div class="form-group w-75 mb-5">
                <label for="exampleInputFile">Update main image</label>
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
            <div class="w-25">
                <img src="{{ asset('storage/'.$post->preview_image) }}" alt="preview_image"  class="w-75">
            </div>
            <div class="form-group w-75 mb-5">
                <label for="exampleInputFile">Update preview image</label>
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
                            {{ ($post->category_id == $category->id) ? 'selected' : '' }}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select tags" style="width: 100%;">
                    @foreach($tags as $tag)
                        <option {{ is_array($post->tags->pluck('id')->toArray()) && (in_array($tag->id, $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}
                             value="{{ $tag->id }}">
                            {{ $tag->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update post</button>
            </div>
        </form>
    </div>
@endsection
