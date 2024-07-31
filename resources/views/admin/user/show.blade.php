@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $user->name }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
                                <li class="breadcrumb-item active">{{ $user->name }}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </div>
        <div class="col-6">
            <table class="table table-hover text-nowrap">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.user.edit', $user->id) }}">Edit</a>
        </div>
        <div class="mb-3">
            <form class="mb-3" action="{{ route('admin.user.destroy', $user->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
    </div>
@endsection
