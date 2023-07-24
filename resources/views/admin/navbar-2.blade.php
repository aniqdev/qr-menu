<nav class="navbar navbar-expand-lg navbar-light bg-white js-top-nav fixed-top_">
  <div class="container">
    <a class="navbar-brand" href="#">QR-Menu Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">

        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item d-lg-none">
            <a class="nav-link js-no-reload-link" href="{{ route('admin.menu') }}">{{ __('admin_sidebar.menu') }}</a>
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link js-no-reload-link" href="{{ route('categories.index') }}">{{ __('admin_sidebar.categories') }}</a>
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link js-no-reload-link" href="{{ route('items.index') }}">{{ __('admin_sidebar.dishes') }}</a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link js-no-reload-link" href="{{ route('admin.qr-code') }}">{{ __('admin_sidebar.qr_code') }}</a>
          </li>
          <li class="nav-item d-lg-none">
            <a class="nav-link js-no-reload-link" href="{{ route('admin.settings') }}">{{ __('admin_sidebar.settings') }}</a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              <li><a class="dropdown-item js-no-reload-link" href="{{ route('admin.menu') }}">{{ __('admin_sidebar.menu') }}</a></li>
              <li><a class="dropdown-item js-no-reload-link" href="{{ route('categories.index') }}">{{ __('admin_sidebar.categories') }}</a></li>
              <li>
              <li><a class="dropdown-item js-no-reload-link" href="{{ route('items.index') }}">{{ __('admin_sidebar.dishes') }}</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li> --}}
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
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>
                @endguest
        </ul>

        {{-- <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
      </div>
    </div>
  </div>
</nav>