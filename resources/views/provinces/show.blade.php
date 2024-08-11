@extends('layouts.app')

@section('title', 'Province Details')

@section('content')
<div class="container">
    <h2>Province Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $province->name }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $province->id }}</p>
        </div>
    </div>
    <a href="{{ route('provinces.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
