@extends('layouts.app')

@section('title', 'Edit District')

@section('content')
<div class="container">
    <h2>Edit District</h2>
    <form action="{{ route('districts.update', $district->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">District Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $district->name }}" required>
        </div>
        <div class="mb-3">
            <label for="division_id" class="form-label">Division</label>
            <select class="form-select" id="division_id" name="division_id" required>
                @foreach($divisions as $division)
                    <option value="{{ $division->id }}" {{ $division->id == $district->division_id ? 'selected' : '' }}>
                        {{ $division->name }} ({{ $division->province->name }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('districts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
