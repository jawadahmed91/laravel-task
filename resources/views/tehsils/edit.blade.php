@extends('layouts.app')

@section('title', 'Edit Tehsil')

@section('content')
<div class="container">
    <h2>Edit Tehsil</h2>
    <form action="{{ route('tehsils.update', $tehsil->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tehsil Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $tehsil->name }}" required>
        </div>
        <div class="mb-3">
            <label for="district_id" class="form-label">District</label>
            <select class="form-select" id="district_id" name="district_id" required>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}" {{ $district->id == $tehsil->district_id ? 'selected' : '' }}>
                        {{ $district->name }} ({{ $district->division->name }} - {{ $district->division->province->name }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tehsils.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
