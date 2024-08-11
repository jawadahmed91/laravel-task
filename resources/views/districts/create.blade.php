@extends('layouts.app')

@section('title', 'Create District')

@section('content')
<div class="container">
    <h2>Create District</h2>
    <form action="{{ route('districts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">District Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="division_id" class="form-label">Division</label>
            <select class="form-select" id="division_id" name="division_id" required>
                <option value="" selected disabled>Select Division</option>
                @foreach($divisions as $division)
                    <option value="{{ $division->id }}">
                        {{ $division->name }} ({{ $division->province->name }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('districts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
