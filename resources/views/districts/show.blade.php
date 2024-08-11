@extends('layouts.app')

@section('title', 'District Details')

@section('content')
<div class="container">
    <h2>District Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $district->name }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $district->id }}</p>
            <p class="card-text"><strong>Division:</strong> {{ $district->division->name }}</p>
            <p class="card-text"><strong>Province:</strong> {{ $district->division->province->name }}</p>
        </div>
    </div>
    <a href="{{ route('districts.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
