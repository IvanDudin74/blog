@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $post->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                            <li class="breadcrumb-item active">{{ $post->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="col-6">
            <table class="table table-hover text-nowrap">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $post->id }}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $post->title }}</td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td>{!! $post->content !!}</td>
                    </tr>
                    <tr>
                        <td>Preview_image</td>
                        <td>
                            <div>
                                <img src="{{ asset('storage/'.$post->preview_image) }}" alt="blog post">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Main_image</td>
                        <td>
                            <div>
                                <img src="{{ asset('storage/'.$post->main_image) }}" alt="blog post">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>{{ $post->category->title }}</td>
                    </tr>
                    <tr>
                        <td>Tags</td>
                        <td>
                            @foreach($post->tags as $tag)
                                #{{ $tag->title }}
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.post.edit', $post->id) }}">Edit</a>
        </div>
        <div class="mb-3">
            <form class="mb-3" action="{{ route('admin.post.destroy', $post->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
    </div>
@endsection
