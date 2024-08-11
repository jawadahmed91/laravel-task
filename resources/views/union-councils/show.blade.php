@extends('layouts.app')

@section('title', 'Union Council Details')

@section('content')
<div class="container">
    <h2>Union Council Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $unionCouncil->name }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $unionCouncil->id }}</p>
            <p class="card-text"><strong>Tehsil:</strong> {{ $unionCouncil->tehsil->name }}</p>
            <p class="card-text"><strong>District:</strong> {{ $unionCouncil->tehsil->district->name }}</p>
            <p class="card-text"><strong>Division:</strong> {{ $unionCouncil->tehsil->district->division->name }}</p>
            <p class="card-text"><strong>Province:</strong> {{ $unionCouncil->tehsil->district->division->province->name }}</p>
        </div>
    </div>
    <a href="{{ route('union-councils.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
