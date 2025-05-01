@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Contact</h1>

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

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Contact Name</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div class="form-group mb-3">
            <label for="phone">Phone</label>
            <input
                type="text"
                name="phone"
                id="phone"
                class="form-control"
                value="{{ old('phone') }}"
                required
            >
        </div>

        <div class="form-group mb-3">
            <label for="email">Email <small class="text-muted">(optional)</small></label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                value="{{ old('email') }}"
            >
        </div>

        <div class="form-group mb-3">
            <label for="contact_type">Contact Type</label>
            <select
                name="contact_type"
                id="contact_type"
                class="form-control"
                required
            >
                <option value="" disabled selected>Select type</option>
                <option value="client" {{ old('contact_type') == 'client' ? 'selected' : '' }}>Client</option>
                <option value="supplier" {{ old('contact_type') == 'supplier' ? 'selected' : '' }}>Supplier</option>
                <option value="partner" {{ old('contact_type') == 'partner' ? 'selected' : '' }}>Partner</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Contact</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
