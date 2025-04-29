@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Login</h1>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('login') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input
                type="text"
                name="username"
                id="username"
                class="form-control"
                value="{{old('username') }}"
                required
            >
        </div>

        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
