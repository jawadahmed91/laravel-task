@extends('layouts.app')

@section('title', 'Edit Division')

@section('content')
<div class="container">
    <h2>Edit Division</h2>
    <form action="{{ route('divisions.update', $division->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Division Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $division->name }}" required>
        </div>
        <div class="mb-3">
            <label for="province_id" class="form-label">Province</label>
            <select class="form-select" id="province_id" name="province_id" required>
                @foreach($provinces as $province)
                    <option value="{{ $province->id }}" {{ $province->id == $division->province_id ? 'selected' : '' }}>
                        {{ $province->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('divisions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
