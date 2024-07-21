@extends('admin.layouts.main')
@section('content')
    <div class="col-12">
        <h1 class="mb-4">Categories</h1>
        <div class="container">
            <div class="mb-3">
                <a class="btn btn-primary" href="{{ route('admin.category.create') }}">Create new category</a>
            </div>

            <div class="col-7">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td><a href="{{ route('admin.category.show', $category->id) }}"><i class="nav-icon far fa-solid fa-magnifying-glass"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
