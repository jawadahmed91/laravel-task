@extends('layouts.app')

@section('title', 'Union Councils')

@section('content')
<div class="container">
    <h2>Union Councils</h2>
    <a href="{{ route('union-councils.create') }}" class="btn btn-primary">Add Union Council</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Tehsil</th>
                <th>District</th>
                <th>Division</th>
                <th>Province</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unionCouncils as $unionCouncil)
                <tr>
                    <td>{{ $unionCouncil->id }}</td>
                    <td>{{ $unionCouncil->name }}</td>
                    <td>{{ $unionCouncil->tehsil->name }}</td>
                    <td>{{ $unionCouncil->tehsil->district->name }}</td>
                    <td>{{ $unionCouncil->tehsil->district->division->name }}</td>
                    <td>{{ $unionCouncil->tehsil->district->division->province->name }}</td>
                    <td>
                        <a href="{{ route('union-councils.edit', $unionCouncil->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('union-councils.destroy', $unionCouncil->id) }}" method="POST" style="display:inline;">
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
