@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Portal</h1>
    
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dashboard</h5>
                    <p class="card-text">Create, edit, or delete user accounts.</p>
                    <a href="{{route('users.index') }}" class="btn btn-primary">Go to Users</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contacts</h5>
                    <p class="card-text">Add, update, or remove contacts.</p>
                    <a href="{{route('contacts.index') }}" class="btn btn-primary">Go to Contacts</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Logout</h5>
                    <p class="card-text">Log out of the admin panel.</p>
                    <form action="{{route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

