<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Polio Drive Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head> 
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Polio Drive</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                @if (auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('provinces.index') }}">Provinces</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('divisions.index') }}">Divisions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('districts.index') }}">Districts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tehsils.index') }}">Tehsils</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('union-councils.index') }}">Union Councils</a>
                    </li>
                    @else
                        Polio Worker Nav Link here
                    @endif
                </ul>
    
                <form action="{{ route('logout') }}" method="POST" style="margin-left: 200px;">
                    Welcome, {{ Auth::user()?->name }}! 
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
    <script>
        $(document).ready(function() {
            // When province changes
            $('#province').on('change', function() {
                var provinceId = $(this).val();
                if (provinceId) {
                    $.ajax({
                        url: '/get-divisions/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#division').empty().append('<option value="">Select Division</option>');
                            $.each(data, function(key, value) {
                                $('#division').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                            $('#division').prop('disabled', false);
                        }
                    });
                } else {
                    $('#division').empty().append('<option value="">Select Division</option>').prop('disabled', true);
                    $('#district').empty().append('<option value="">Select District</option>').prop('disabled', true);
                    $('#tehsil').empty().append('<option value="">Select Tehsil</option>').prop('disabled', true);
                    $('#union_council').empty().append('<option value="">Select Union Council</option>').prop('disabled', true);
                }
            });

            // When division changes
            $('#division').on('change', function() {
                var divisionId = $(this).val();
                if (divisionId) {
                    $.ajax({
                        url: '/get-districts/' + divisionId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#district').empty().append('<option value="">Select District</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                            $('#district').prop('disabled', false);
                        }
                    });
                } else {
                    $('#district').empty().append('<option value="">Select District</option>').prop('disabled', true);
                    $('#tehsil').empty().append('<option value="">Select Tehsil</option>').prop('disabled', true);
                    $('#union_council').empty().append('<option value="">Select Union Council</option>').prop('disabled', true);
                }
            });

            // When district changes
            $('#district').on('change', function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '/get-tehsils/' + districtId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#tehsil').empty().append('<option value="">Select Tehsil</option>');
                            $.each(data, function(key, value) {
                                $('#tehsil').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                            $('#tehsil').prop('disabled', false);
                        }
                    });
                } else {
                    $('#tehsil').empty().append('<option value="">Select Tehsil</option>').prop('disabled', true);
                    $('#union_council').empty().append('<option value="">Select Union Council</option>').prop('disabled', true);
                }
            });

            // When tehsil changes
            $('#tehsil').on('change', function() {
                var tehsilId = $(this).val();
                if (tehsilId) {
                    $.ajax({
                        url: '/get-union-councils/' + tehsilId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#union_council').empty().append('<option value="">Select Union Council</option>');
                            $.each(data, function(key, value) {
                                $('#union_council').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                            $('#union_council').prop('disabled', false);
                        }
                    });
                } else {
                    $('#union_council').empty().append('<option value="">Select Union Council</option>').prop('disabled', true);
                }
            });
        });

    </script>
</body>
</html>
