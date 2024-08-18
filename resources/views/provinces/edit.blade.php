@extends('layouts.app')

@section('title', 'Edit Province')

@section('content')
<div class="container">
    <h2>Edit Province</h2>
    <form action="{{ route('provinces.update', $province->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <label for="name" class="form-label">Province Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $province->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('provinces.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
