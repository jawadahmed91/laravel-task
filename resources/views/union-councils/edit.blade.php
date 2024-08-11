@extends('layouts.app')

@section('title', 'Edit Union Council')

@section('content')
<div class="container">
    <h2>Edit Union Council</h2>
    <form action="{{ route('union-councils.update', $unionCouncil->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Union Council Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $unionCouncil->name }}" required>
        </div>
        <div class="mb-3">
            <label for="tehsil_id" class="form-label">Tehsil</label>
            <select class="form-select" id="tehsil_id" name="tehsil_id" required>
                @foreach($tehsils as $tehsil)
                    <option value="{{ $tehsil->id }}" {{ $unionCouncil->tehsil_id == $tehsil->id ? 'selected' : '' }}>
                        {{ $tehsil->name }} ({{ $tehsil->district->name }} - {{ $tehsil->district->division->name }} - {{ $tehsil->district->division->province->name }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('union-councils.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
