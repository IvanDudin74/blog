@extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="mb-3">
            Send this password to user: {{ $password }}
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.user.index') }}">OK</a>
        </div>
    </div>
@endsection
