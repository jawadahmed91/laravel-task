@extends('layouts.app')

@section('title', 'Create Province')

@section('content')
<div class="container">
    <h2>Create Province</h2>
    <form action="{{ route('provinces.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Province Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('provinces.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
