@extends('layouts.app')

@section('title', 'Create Division')

@section('content')
<div class="container">
    <h2>Create Division</h2>
    <form action="{{ route('divisions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Division Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="province_id" class="form-label">Province</label>
            <select class="form-select" id="province_id" name="province_id" required>
                <option value="" selected disabled>Select Province</option>
                @foreach($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('divisions.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
