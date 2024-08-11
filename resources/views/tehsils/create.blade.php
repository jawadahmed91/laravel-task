@extends('layouts.app')

@section('title', 'Create Tehsil')

@section('content')
<div class="container">
    <h2>Create Tehsil</h2>
    <form action="{{ route('tehsils.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tehsil Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="district_id" class="form-label">District</label>
            <select class="form-select" id="district_id" name="district_id" required>
                <option value="" selected disabled>Select District</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}">
                        {{ $district->name }} ({{ $district->division->name }} - {{ $district->division->province->name }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('tehsils.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
