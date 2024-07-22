@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <form class="w-25" action="{{ route('admin.tag.store') }}" method="post">
            @csrf
            <div>
                <label for="title" class="form-label">New tag</label>
                <input type="text" class="form-control mb-3" id="title" name="title" placeholder="Enter tag">
                @error('title')
                    <div class="danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
