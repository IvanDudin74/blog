@extends('personal.layouts.main')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit comment</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Main</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('personal.comment.index') }}">Comments</a></li>
                            <li class="breadcrumb-item active">Edit comment</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <form class="mb-3" action="{{ route('personal.comment.update', $comment->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <textarea type="text" class="form-control w-50" id="message" name="message">{{ $comment->message }}</textarea>
                @error('message')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <!-- /.content -->
@endsection
