<style>
.langs img{
     box-shadow: 0 0 4px #a3a3a3;
}
.not-owner{
    box-shadow: inset 0 0 10px red;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-white js-top-nav fixed-top_ {{ auth()->user()->isSuperAdminNotOwner('not-owner') }}" id="top_nav">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ logo_src() }}" alt="qr-menu logo" id="qr_menu_logo" style="width: 200px; margin: -10px 0;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    <img src="{{ logo_src() }}" alt="qr-menu logo" id="qr_menu_logo" style="width: 200px; margin: -10px 0;">
                </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item d-lg-none_">
                        <a class="nav-link js-no-reload-link" href="{{ route('dashboard') }}">
                            {{ _t('admin_nav.dashboard') }}
                        </a>
                    </li>
                    @if(auth()->user()->isSuperAdmin())
                    <li class="nav-item d-lg-none_">
                        <a class="nav-link" href="{{ route('translations.update') }}"
                        	onclick="
                        		event.preventDefault();
                        		$.get(this.href, data => data.status === 'success' && location.reload())
                        	">
                            TranSync <i class="bi bi-arrow-repeat"></i>
                        </a>
                    </li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link_ btn btn-outline-success" 
                            href="{{ auth()->user()->company->cafeLink() }}" 
                            title="{{ _t('admin_nav.view_menu') }}" style_="color: #198754;" 
                            target="_blank"
                            {{-- onclick="modal_load(event, this)" --}}
                            data-modalurl="{{ route('menu-modal', ['category' => 1]) }}">
                            {{ _t('admin_nav.view') }}
                            <i class="bi bi-cup-straw"></i>
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link js-no-reload-link" href="{{ route('categories.index') }}">
                            <i class="bi bi-list-ul me-1"></i>
                            {{ _t('admin_nav.categories') }}
                        </a>
                    </li>
                    <li class="nav-item d-lg-none border-bottom">
                        <a class="nav-link js-no-reload-link" href="{{ route('items.index') }}">
                            <i class="bi bi-egg-fried me-1"></i>
                            {{ _t('admin_nav.dishes') }}
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link js-no-reload-link" href="{{ route('admin.menu') }}">
                            <i class="bi bi-filetype-html me-1"></i>
                            {{ _t('admin_nav.templates') }}
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link js-no-reload-link" href="{{ route('admin.qr-code') }}">
                            <i class="bi bi-qr-code"></i>
                            <span class="ms-1">{{ _t('admin_nav.qr_code') }}</span>
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link js-no-reload-link" href="{{ route('admin.settings') }}">
                            <i class="bi bi-sliders"></i>
                            <span class="ms-1">{{ _t('admin_nav.settings') }}</span>
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="{{ route('admin.statistics') }}">
                            <i class="bi bi-graph-up-arrow"></i>
                            <span class="ms-1">{{ _t('admin_nav.statistics') }}</span>
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link js-no-reload-link" href="{{ route('admin.feedbacks') }}">
                            <i class="bi bi-chat-square-text"></i>
                            <span class="ms-1">{{ _t('admin_nav.feedback') }}</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			  Dropdown
			</a>
								<ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
									<li>
										<a class="dropdown-item js-no-reload-link" href="{{ route('admin.menu') }}">{{ _t('admin_nav.menu') }}</a>
                    </li>
                    <li>
                        <a class="dropdown-item js-no-reload-link" href="{{ route('categories.index') }}">{{ _t('admin_nav.categories') }}</a>
                    </li>
                    <li>
                    <li>
                        <a class="dropdown-item js-no-reload-link" href="{{ route('items.index') }}">{{ _t('admin_nav.dishes') }}</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                    </ul>
                    </li> --}}
                    <li class="nav-item dropdown langs">
                        <a id="navbarDropdownLangs" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="me-1">{{ _t('admin_nav.lang') }} </span>
                            <img src="/svg/flag-{{ Auth::user()->lang }}.svg" alt="" width="20">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownLangs"> 
                            @if(Auth::user()->lang !== 'uk') <a class="dropdown-item" href="{{ route('profile.change-lang', 'uk') }}">
                                <img src="/svg/flag-uk.svg" width="20" alt="">
                                 Ukrainian </a> @endif
                            @if(Auth::user()->lang !== 'en') <a class="dropdown-item" href="{{ route('profile.change-lang', 'en') }}">
                                <img src="/svg/flag-en.svg" width="20" alt="">
                                 English </a> @endif
                            @if(Auth::user()->lang !== 'ru') <a class="dropdown-item" href="{{ route('profile.change-lang', 'ru') }}">
                                <img src="/svg/flag-ru.svg" width="20" alt="">
                                 Russian </a> @endif
                        </div>
                    </li>
                    <!-- Authentication Links -->
                    @guest 
                        @if (Route::has('login')) 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ _t('Login') }}</a>
                        </li> 
                        @endif 
                        @if (Route::has('register')) 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ _t('Register') }}</a>
                        </li> 
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownAdmin" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}({{ Auth::user()->company->name }})
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownAdmin">
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    {{ _t('Logout') }}
                                </a>
                            </div>
                        </li> 
                    @endguest
                    <li class="nav-item d-lg-none">
                        <a class="nav-link_ btn btn-outline-success" 
                            href="{{ auth()->user()->company->cafeLink() }}" 
                            title="{{ _t('admin_nav.view_menu') }}" style_="color: #198754;" 
                            target="_blank"
                            {{-- onclick="modal_load(event, this)" --}}
                            data-modalurl="{{ route('menu-modal', ['category' => 1]) }}">
                            {{ _t('admin_nav.view') }}
                            <i class="bi bi-cup-straw"></i>
                        </a>
                    </li>
                </ul>
                {{-- <form class="d-flex">
									<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
										<button class="btn btn-outline-success" type="submit">Search</button>
									</form> --}}
            </div>
        </div>
    </div>
</nav>