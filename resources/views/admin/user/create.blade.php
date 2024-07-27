@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <h1>New user:</h1>
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
