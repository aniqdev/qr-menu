<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body class="">
    <div id="app_root">
        @yield('content')
    </div>

    <script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
