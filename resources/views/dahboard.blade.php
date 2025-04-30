@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5">Admin Dashboard</h2>

    <div class="row justify-content-center g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-3">Manage Users</h5>
                    <p class="card-text flex-grow-1">Create, edit, or delete user accounts from the system.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-primary mt-auto">Go to Users</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-3">Manage Contacts</h5>
                    <p class="card-text flex-grow-1">Add, update, or remove contact records.</p>
                    <a href="{{ route('contacts.index') }}" class="btn btn-outline-primary mt-auto">Go to Contacts</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-3">Logout</h5>
                    <p class="card-text flex-grow-1">Securely end your admin session.</p>
                    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
