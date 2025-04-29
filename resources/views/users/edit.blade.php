@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User: {{ $user->full_name }}</h1>

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

    {{-- User Edit Form --}}
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input
                type="text"
                name="username"
                id="username"
                class="form-control"
                value="{{ old('username', $user->username) }}"
                required
                maxlength="50"
            >
        </div>

        <div class="form-group mb-3">
            <label for="full_name">Full Name</label>
            <input
                type="text"
                name="full_name"
                id="full_name"
                class="form-control"
                value="{{ old('full_name', $user->full_name) }}"
                required
                maxlength="100"
            >
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                value="{{ old('email', $user->email) }}"
                required
                maxlength="100"
            >
        </div>

        <div class="form-group mb-3">
            <label for="contact_number">Contact Number</label>
            <input
                type="text"
                name="contact_number"
                id="contact_number"
                class="form-control"
                value="{{ old('contact_number', $user->contact_number) }}"
                maxlength="20"
            >
        </div>

        <div class="form-group mb-3">
            <label for="password">Password (Leave blank to keep current)</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                minlength="6"
            >
        </div>

        <div class="form-group mb-3">
            <label for="password_confirmation">Confirm Password</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-control"
            >
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
