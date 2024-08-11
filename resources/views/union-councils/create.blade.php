@extends('layouts.app')

@section('title', 'Create Union Council')

@section('content')
<div class="container">
    <h2>Create Union Council</h2>
    <form action="{{ route('union-councils.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Union Council Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="tehsil_id" class="form-label">Tehsil</label>
            <select class="form-select" id="tehsil_id" name="tehsil_id" required>
                <option value="" selected disabled>Select Tehsil</option>
                @foreach($tehsils as $tehsil)
                    <option value="{{ $tehsil->id }}">
                        {{ $tehsil->name }} ({{ $tehsil->district->name }} - {{ $tehsil->district->division->name }} - {{ $tehsil->district->division->province->name }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('union-councils.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
