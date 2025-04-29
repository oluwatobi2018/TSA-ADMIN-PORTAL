@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>500 - Internal Server Error</h2>
                </div>
                <div class="card-body">
                    <p>Oops! Something went wrong on our end. We’re working hard to fix it. Please try again later.</p>
                    <p>If you believe this is a problem with our system, please <a href="mailto:support@yourapp.com">contact support</a>.</p>
                    <p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Go to Home</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
