<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Profile</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>{{ Auth::user()->role }}</td>
                            </tr>
                            @if (Auth::user()->role == 'polio_worker')
                                @php
                                    $assignment = Auth::user()->assignment;
                                @endphp
                                <tr>
                                    <th>Assigned Union Council</th>
                                    <td>{{ $assignment ? $assignment->unionCouncil->name : 'Not Assigned' }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    @if (Auth::user()->role == 'polio_worker' && $assignment)
                        <h4>Union Council Details</h4>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Union Council</th>
                                    <td>{{ $assignment->unionCouncil->name }}</td>
                                </tr>
                                <tr>
                                    <th>Tehsil</th>
                                    <td>{{ $assignment->unionCouncil->tehsil->name }}</td>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <td>{{ $assignment->unionCouncil->tehsil->district->name }}</td>
                                </tr>
                                <tr>
                                    <th>Division</th>
                                    <td>{{ $assignment->unionCouncil->tehsil->district->division->name }}</td>
                                </tr>
                                <tr>
                                    <th>Province</th>
                                    <td>{{ $assignment->unionCouncil->tehsil->district->division->province->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
