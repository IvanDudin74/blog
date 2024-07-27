@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit user</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container">
        <form class="mb-3 w-25" action="{{ route('admin.user.update', $user->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label>Select role</label>
                <select class="form-control" name="role">
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}"
                            {{ ($id == $user->role) ? 'selected' :'' }}
                        >{{ $role }}</option>
                    @endforeach
                </select>
                @error('role')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
