<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Movie List{{ isset($title) ? ' | ' . $title : '' }}</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/png">

    <!-- Styles -->
    @include('layouts.ext-css')
    @stack('css')
</head>

<body>
    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')

    @include('layouts.ext-js')
    <script>
        $('#logout').click(function (){
            Swal.fire({
                title: 'Are you sure you want to logout ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                confirmButtonColor: '#FF0000',
                cancelButtonText: 'No',
                cancelButtonColor: '#3085d6',
            }).then(function(result) {
                if (result.value) {
                    document.getElementById('logout-form').submit();
                }
            })
        })
    </script>
    @stack('js')
</body>

</html>