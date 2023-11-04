<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf_token">

    <title>QR-Menu</title>

    <link rel="stylesheet" href="/css/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="/css/bootstrap-grey.css"> --}}
    <link rel="stylesheet" href="/css/toastr.min.css"/>
    <link rel="stylesheet" href="/css/jquery-ui.min.css"/>

   <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
   <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">

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

    @include('admin.blocks.footer')

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
    <script src="/js/bs-jsonform.js" crossorigin="anonymous"></script>
    <script src="/js/owl.carousel.min.js" crossorigin="anonymous"></script>
    <script src="/js.php" crossorigin="anonymous"></script>
</body>
</html>
