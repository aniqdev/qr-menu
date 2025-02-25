<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg headroom py-lg-3 px-lg-6 navbar-light navbar-theme-primary">
    <div class="container">
        <a class="navbar-brand @@logo_classes" href="/">
            <img class="navbar-brand-dark common" src="{{ logo_src() }}" height="35" alt="Logo">
            <img class="navbar-brand-light common" src="{{ logo_src() }}" height="35" alt="Logo">
        </a>
        <div class="navbar-collapse collapse" id="navbar_global">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="/">
                            <img src="{{ logo_src() }}" height="35" alt="Logo">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <a href="#navbar_global" role="button" class="fas fa-times" data-toggle="collapse"
                            data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                        aria-label="Toggle navigation"></a>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav navbar-nav-hover justify-content-center">
                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#product" class="nav-link">{{ _t('qrlanding.product') }}</a>
                </li>
                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#pricing" class="nav-link" >{{ _t('qrlanding.pricing') }}</a>
                </li>
                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#testimonials" class="nav-link">{{ _t('qrlanding.testimonials') }}</a>
                </li>
                <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                    <a data-scroll href="#demo" class="nav-link">{{ _t('qrlanding.demo') }}</a>
                </li>
                @if(count($availableLanguages)>1)
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        @foreach ($availableLanguages as $short => $lang)
                        @if(strtolower($short) == strtolower($locale)) <span>{{ __($lang) }}</span> @endif
                        @endforeach
                        <i class="fas fa-angle-down nav-link-arrow ml-2"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($availableLanguages as $short => $lang)
                        <li>
                            <a class="dropdown-item" href="/{{ strtolower($short) }}">{{ __($lang) }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @if(!empty(config('global.facebook')))
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ config('global.facebook') }}" target="_blank" data-toggle="tooltip" title="{{ _t('Like us on Facebook') }}">
                        <i class="fab fa-facebook-square mr-2"></i>
                        <span class="nav-link-inner--text d-lg-none">{{ _t('Facebook') }}</span>
                    </a>
                </li>
                @endif
                @if(!empty(config('global.instagram')))
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ config('global.instagram') }}" target="_blank" data-toggle="tooltip" title="{{ _t('Follow us on Instagram') }}">
                        <i class="fab fa-instagram mr-2"></i>
                        <span class="nav-link-inner--text d-lg-none">{{ _t('Instagram') }}</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <div class=" @@cta_button_classes">
            <a data-scroll href="/login" class="btn btn-md btn-docs btn-white animate-up-2 mr-3"><i class="fas fa-th-large mr-2"></i>
                @auth()
                {{ _t('qrlanding.dashboard')}}
                @endauth
                @guest()
                {{ _t('qrlanding.login')}}
                @endguest
            </a>
            @guest()
            <a href="{{ route('register') }}" class="btn btn-md btn-primary animate-up-2"><i class="fas fa-paper-plane mr-2"></i>{{ _t('qrlanding.register')}}</a>
            @endguest
        </div>
        <div class="d-flex d-lg-none align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
            aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"></span></button>
        </div>
    </div>
</nav>