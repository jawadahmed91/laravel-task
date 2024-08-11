<!-- resources/views/users/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password (leave blank if not changing)</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-select">
                    <option value="polio_worker" {{ old('role', $user->role) == $user->polio_worker ? 'selected' : '' }}>Polio Worker</option>
                    <option value="admin" {{ old('role', $user->role) == $user->admin ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            @if(old('role', $user->role) == 'polio_worker')
            <div class="form-group">
                <label for="province">Province</label>
                <select id="province" name="province" class="form-select">
                    <option value="">Select Province</option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}" {{ old('province', $user->assignment->unionCouncil->tehsil->district->division->province->id ?? '') == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>
                    @endforeach
                </select>
                @error('province')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="division">Division</label>
                <select id="division" name="division" class="form-select">
                    <option value="">Select Division</option>
                    <!-- Options will be populated dynamically via AJAX -->
                </select>
                @error('division')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="district">District</label>
                <select id="district" name="district" class="form-select">
                    <option value="">Select District</option>
                    <!-- Options will be populated dynamically via AJAX -->
                </select>
                @error('district')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tehsil">Tehsil</label>
                <select id="tehsil" name="tehsil" class="form-select">
                    <option value="">Select Tehsil</option>
                    <!-- Options will be populated dynamically via AJAX -->
                </select>
                @error('tehsil')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="union_council">Union Council</label>
                <select id="union_council" name="union_council" class="form-select">
                    <option value="">Select Union Council</option>
                    <!-- Options will be populated dynamically via AJAX -->
                </select>
                @error('union_council')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        @endif

            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
