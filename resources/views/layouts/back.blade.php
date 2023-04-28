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
    {{-- <link rel="stylesheet" href="/css/bootstrap-grey.css"> --}}
    <link rel="stylesheet" href="/css/toastr.min.css"/>
    <link rel="stylesheet" href="/css/jquery-ui.min.css"/>

    <link rel="stylesheet" href="/css/style.css?v={{ filemtime(public_path('css/style.css')) }}">

    <script src="/js/jquery.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/jquery.ui.touch-punch.min.js"></script>
    <script>
        var log = console.log
    </script>
    <script src="/js/toastr.min.js"></script>{{-- https://github.com/CodeSeven/toastr --}}
</head>
<body class="ajax-loader">
    <div id="app_root">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Menu Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-4">
            <div class="row">
                <div class="col-md-2">
                    @include('back.sidebar')
                </div>
                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <footer class="bd-footer py-2 py-md-4 mt-3 bg-white">
       <div class="container py-2 py-md-4 px-2 px-md-3">
          <div class="row">
             <div class="col-lg-3 mb-3">
                <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/" aria-label="Bootstrap">
                   <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="d-block me-2" viewBox="0 0 118 94" role="img">
                      <title>Bootstrap</title>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path>
                   </svg>
                   <span class="fs-5">Bootstrap</span>
                </a>
                <ul class="list-unstyled small text-muted">
                   <li class="mb-2">Designed and built with all the love in the world by the <a href="/docs/5.2/about/team/">Bootstrap team</a> with the help of <a href="https://github.com/twbs/bootstrap/graphs/contributors">our contributors</a>. </li>
                   <li class="mb-2">Code licensed <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a>, docs <a href="https://creativecommons.org/licenses/by/3.0/" target="_blank" rel="license noopener">CC BY 3.0</a>. </li>
                   <li class="mb-2">Currently v5.2.3.</li>
                </ul>
             </div>
             <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                <h5>Links</h5>
                <ul class="list-unstyled">
                   <li class="mb-2">
                      <a href="/">Home</a>
                   </li>
                   <li class="mb-2">
                      <a href="/docs/5.2/">Docs</a>
                   </li>
                   <li class="mb-2">
                      <a href="/docs/5.2/examples/">Examples</a>
                   </li>
                   <li class="mb-2">
                      <a href="https://icons.getbootstrap.com/">Icons</a>
                   </li>
                   <li class="mb-2">
                      <a href="https://themes.getbootstrap.com/">Themes</a>
                   </li>
                </ul>
             </div>
             <div class="col-6 col-lg-2 mb-3">
                <h5>Guides</h5>
                <ul class="list-unstyled">
                   <li class="mb-2">
                      <a href="/docs/5.2/getting-started/">Getting started</a>
                   </li>
                   <li class="mb-2">
                      <a href="/docs/5.2/examples/starter-template/">Starter template</a>
                   </li>
                   <li class="mb-2">
                      <a href="/docs/5.2/getting-started/webpack/">Webpack</a>
                   </li>
                </ul>
             </div>
             <div class="col-6 col-lg-2 mb-3">
                <h5>Projects</h5>
                <ul class="list-unstyled">
                   <li class="mb-2">
                      <a href="https://github.com/twbs/bootstrap">Bootstrap 5</a>
                   </li>
                   <li class="mb-2">
                      <a href="https://github.com/twbs/bootstrap/tree/v4-dev">Bootstrap 4</a>
                   </li>
                   <li class="mb-2">
                      <a href="https://github.com/twbs/icons">Icons</a>
                   </li>
                </ul>
             </div>
             <div class="col-6 col-lg-2 mb-3">
                <h5>Community</h5>
                <ul class="list-unstyled">
                   <li class="mb-2">
                      <a href="https://github.com/twbs/bootstrap/issues">Issues</a>
                   </li>
                   <li class="mb-2">
                      <a href="https://github.com/twbs/bootstrap/discussions">Discussions</a>
                   </li>
                   <li class="mb-2">
                      <a href="https://github.com/sponsors/twbs">Corporate sponsors</a>
                   </li>
                </ul>
             </div>
          </div>
       </div>
    </footer>

    <div class="axaj-loader-wrap" id="ajax_loader">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    
    <script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> --}}
    {{-- <script src="/js/main.js?v={{ filemtime(public_path('js/main.js')) }}"></script> --}}
    <script src="/js.php"></script>
</body>
</html>
