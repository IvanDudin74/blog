@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">New user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">create</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <form action="{{ route('admin.user.store') }}" method="post">
            @csrf
            <div class="w-25 mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group w-25">
                <label>Select role</label>
                <select class="form-control" name="role">
                        @foreach($roles as $id => $role)
                        <option value="{{ $id }}"
                                {{ ($id == old('role')) ? 'selected' :'' }}
                        >{{ $role }}</option>
                        @endforeach
                </select>
                @error('role')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-25 mb-3">
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
