@extends('personal.layouts.main')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comments</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Main</a></li>
                            <li class="breadcrumb-item active">Comments</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post (title)</th>
                            <th>Comment</th>
                            <th colspan="3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($comments as $comment)
                            @dd($comment->post->title)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ mb_substr($comment->post->title, 0, 20) }}</td>
                                <td>{{ mb_substr($comment->message, 0, 20) }}</td>
                                <td><a href="{{ route('personal.comment.edit', $comment->id) }}">Edit</a></td>
                                <td>
                                    <form class="mb-3" action="{{ route('personal.comment.destroy', $comment->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-primary">Delete comment</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.content -->
@endsection
