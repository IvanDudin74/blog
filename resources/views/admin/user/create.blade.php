@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <h1>New user:</h1>
        <form action="{{ route('admin.user.store') }}" method="post">
            @csrf
            <div class="w-25 mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-25 mb-3">
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="w-25 mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
