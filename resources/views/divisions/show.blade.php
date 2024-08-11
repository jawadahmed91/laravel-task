@extends('layouts.app')

@section('title', 'Division Details')

@section('content')
<div class="container">
    <h2>Division Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $division->name }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $division->id }}</p>
            <p class="card-text"><strong>Province:</strong> {{ $division->province->name }}</p>
        </div>
    </div>
    <a href="{{ route('divisions.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
