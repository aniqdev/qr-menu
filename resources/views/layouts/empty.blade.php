<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf_token"> --}}

    <title>@yield('title', 'QR-Menu')</title>
</head>
<body class="@yield('body-classes')">

@yield('content')

</body>
</html>
