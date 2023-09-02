<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf_token">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    {{-- <link rel="stylesheet" href="/css/style.css?v={{ filemtime(public_path('css/style.css')) }}"> --}}

    {{-- <script src="/js/jquery.min.js"></script> --}}
    {{-- <script src="/js/jquery-ui.min.js"></script> --}}
    {{-- <script src="/js/jquery.ui.touch-punch.min.js"></script> --}}
    {{-- <script>var log = console.log</script> --}}

    {{-- https://github.com/CodeSeven/toastr --}}
    {{-- <script src="/js/toastr.min.js"></script> --}}
    <style>
        body{
            overflow-x: hidden;
            background: #f7f3ff;
        }

        img{
            max-width: 100%;
        }

        a{
            text-decoration: none;
        }
    </style>
</head>
<body class="ajax-loader">
    <div id="app_root">
        <main class="container py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
