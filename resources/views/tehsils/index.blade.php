@extends('layouts.app')

@section('title', 'Tehsils')

@section('content')
<div class="container">
    <h2>Tehsils</h2>
    <a href="{{ route('tehsils.create') }}" class="btn btn-primary">Add Tehsil</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>District</th>
                <th>Division</th>
                <th>Province</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tehsils as $tehsil)
                <tr>
                    <td>{{ $tehsil->id }}</td>
                    <td>{{ $tehsil->name }}</td>
                    <td>{{ $tehsil->district->name }}</td>
                    <td>{{ $tehsil->district->division->name }}</td>
                    <td>{{ $tehsil->district->division->province->name }}</td>
                    <td>
                        <a href="{{ route('tehsils.edit', $tehsil->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('tehsils.destroy', $tehsil->id) }}" method="POST" style="display:inline;">
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
