@extends('layouts.app')

@section('title', 'Divisions')

@section('content')
<div class="container">
    <h2>Divisions</h2>
    <a href="{{ route('divisions.create') }}" class="btn btn-primary">Add Division</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Province</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($divisions as $division)
                <tr>
                    <td>{{ $division->id }}</td>
                    <td>{{ $division->name }}</td>
                    <td>{{ $division->province->name }}</td>
                    <td>
                        <a href="{{ route('divisions.edit', $division->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('divisions.destroy', $division->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
