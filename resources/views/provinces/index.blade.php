@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Provinces</h2>
    <a href="{{ route('provinces.create') }}" class="btn btn-primary">Add Province</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($provinces as $province)
                <tr>
                    <td>{{ $province->id }}</td>
                    <td>{{ $province->name }}</td>
                    <td>
                        <a href="{{ route('provinces.edit', $province->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('provinces.destroy', $province->id) }}" method="POST" style="display:inline;">
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
