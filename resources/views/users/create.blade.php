<!-- resources/views/users/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create User</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-select">
                    <option value="polio_worker">Polio Worker</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
            <label for="province">Province</label>
            <select id="province" name="province_id" class="form-select">
                <option value="">Select Province</option>
                @foreach($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach
            </select>
            @error('province_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="division">Division</label>
            <select id="division" name="division_id" class="form-select" disabled>
                <option value="">Select Division</option>
            </select>
            @error('division_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="district">District</label>
            <select id="district" name="district_id" class="form-select" disabled>
                <option value="">Select District</option>
            </select>
            @error('district_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tehsil">Tehsil</label>
            <select id="tehsil" name="tehsil_id" class="form-select" disabled>
                <option value="">Select Tehsil</option>
            </select>
            @error('tehsil_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="union_council">Union Council</label>
            <select id="union_council" name="union_council_id" class="form-select" disabled>
                <option value="">Select Union Council</option>
            </select>
            @error('union_council_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


            <button type="submit" class="btn btn-primary">Create User</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
