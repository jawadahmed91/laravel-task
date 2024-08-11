@extends('layouts.app')

@section('title', 'Districts')

@section('content')
<div class="container">
    <h2>Districts</h2>
    <a href="{{ route('districts.create') }}" class="btn btn-primary">Add District</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Division</th>
                <th>Province</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($districts as $district)
                <tr>
                    <td>{{ $district->id }}</td>
                    <td>{{ $district->name }}</td>
                    <td>{{ $district->division->name }}</td>
                    <td>{{ $district->division->province->name }}</td>
                    <td>
                        <a href="{{ route('districts.edit', $district->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('districts.destroy', $district->id) }}" method="POST" style="display:inline;">
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
