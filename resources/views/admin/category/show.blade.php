@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="col-6">
            <table class="table table-hover text-nowrap">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $category->id }}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $category->title }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.category.edit', $category->id) }}">Edit</a>
        </div>
        <div class="mb-3">
            <form class="mb-3" action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
    </div>
@endsection