@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>404 - Page Not Found</h2>
                </div>
                <div class="card-body">
                    <p>Sorry, the page you are looking for could not be found. It might have been moved or deleted.</p>
                    <p>If you believe this is an error, please contact the administrator or <a href="{{ route('dashboard') }}">go back to the dashboard</a>.</p>
                    <p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Go Home</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
