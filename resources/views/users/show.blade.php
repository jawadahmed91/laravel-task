@extends('layouts.app')

@section('title', 'Tehsil Details')

@section('content')
<div class="container">
    <h2>Tehsil Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $tehsil->name }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $tehsil->id }}</p>
            <p class="card-text"><strong>District:</strong> {{ $tehsil->district->name }}</p>
            <p class="card-text"><strong>Division:</strong> {{ $tehsil->district->division->name }}</p>
            <p class="card-text"><strong>Province:</strong> {{ $tehsil->district->division->province->name }}</p>
        </div>
    </div>
    <a href="{{ route('tehsils.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
