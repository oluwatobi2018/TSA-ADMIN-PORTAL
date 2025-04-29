@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Contact</h1>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Contact Name</label>
            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{old('name', $contact->name) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input
                type="text"
                name="phone"
                id="phone"
                class="form-control"
                value="{{old('phone', $contact->phone) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email <small>(optional)</small></label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                value="{{old('email', $contact->email) }}"
            >
        </div>

        <button type="submit" class="btn btn-success">Update Contact</button>
        <a href="{{route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
