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

    <link rel="stylesheet" href="/css/bootstrap-colors.css?v={{ filemtime(public_path('css/bootstrap-colors.css')) }}">
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
        {{-- @include('admin.navbar-1') --}}
        @include('admin.navbar-2')


        <main class="container py-4">
            <div class="row">
                <div class="col-md-2 d-none d-lg-block">
                    @include('admin.sidebar')
                </div>
                <div class="col-lg-10">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <footer class="bd-footer mt-3 bg-white">
       <div class="container pt-2 pt-md-4 px-2 px-md-3">
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
                </ul>
             </div>
             <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                <h5>Links</h5>
                <ul class="list-unstyled">
                   <li class="mb-2">
                      <a href="/">Home</a>
                   </li>
                </ul>
             </div>
             <div class="col-6 col-lg-2 mb-3">
                <h5>Guides</h5>
                <ul class="list-unstyled">
                   <li class="mb-2">
                      <a href="/docs/5.2/getting-started/">Getting started</a>
                   </li>
                </ul>
             </div>
             <div class="col-6 col-lg-2 mb-3">
                <h5>Projects</h5>
                <ul class="list-unstyled">
                   <li class="mb-2">
                      <a href="https://github.com/twbs/bootstrap">Bootstrap 5</a>
                   </li>
                </ul>
             </div>
             <div class="col-6 col-lg-2 mb-3">
                <h5>Community</h5>
                <ul class="list-unstyled">
                   <li class="mb-2">
                      <a href="https://github.com/twbs/bootstrap/issues">Issues</a>
                   </li>
                </ul>
             </div>
          </div>
       </div>
    </footer>

   <!-- Universal modal -->
   <div class="modal fade" id="universalModal" tabindex="-1" aria-labelledby="universalModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content" id="universal_modal_content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="universalModalLabel">...</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               ...
            </div>
            <div class="modal-footer">
               ...
            </div>
         </div>
      </div>
   </div>

    <div class="axaj-loader-wrap" id="ajax_loader">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    
    <script src="/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/js/bs-jsonform.js"></script>
    <script src="/js.php"></script>
</body>
</html>
