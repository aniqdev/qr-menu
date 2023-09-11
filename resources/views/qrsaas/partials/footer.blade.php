<footer class="footer section pt-6 pt-md-8 pt-lg-10 pb-3 bg-primary text-white overflow-hidden">
    <div class="pattern pattern-soft top"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mb-4 mb-lg-0">
                <a href="#" class="icon icon-lg text-white mr-3 ">
                    <h3>{{  config('app.name') }}</h3>
                </a>
                <p class="my-4">{{ _t('qrlanding.hero_title')}}<br />{{ _t('qrlanding.hero_subtitle') }}</p>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-lg-0">
                <h6>{{ _t('qrlanding.helpful_links')     }}</h6>
                <ul class="links-vertical">
                    @foreach ($pages as $page)
                    <li><a target="_blank" href="{{ $page->slug }}">
                        {!! $page->icon !!}
                        <span class="px-1"></span>
                        {{ $page->title }}
                    </a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-lg-0">
                <h6>{{ _t('qrlanding.my_account')     }}</h6>
                <ul class="links-vertical">
                    <li><a target="_blank" href="/login">
                        @auth()
                        {{ _t('qrlanding.dashboard')}}
                        @endauth
                        @guest()
                        {{ _t('qrlanding.login')}}
                        @endguest
                    </a></li>
                    @guest()
                    <li><a href="{{ route('register') }}">{{ _t('qrlanding.register') }}</a></li>
                    @endguest
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                @guest()
                <h6>{{ _t('qrlanding.register')     }}</h6>
                <form action="{{ route('register') }}" class="d-flex flex-column mb-5 mb-lg-0">
                    <input class="form-control" type="text" name="name" placeholder="{{ _t('qrlanding.hero_input_name')}}" required>
                    <input class="form-control my-3" type="email" name="email" placeholder="{{ _t('qrlanding.hero_input_email')}}" required>
                    <input class="form-control my-1" type="text" name="phone" placeholder="{{ _t('qrlanding.hero_input_phone')}}" required>
                    <button class="btn btn-primary my-3" type="submit">{{ _t('qrlanding.join_now')}}</button>
                </form>
                @endguest
            </div>
        </div>
        @if (config('settings.enable_default_cookie_consent'))
        {{-- @include('cookieConsent::index') --}}
        <s>cookieConsent::index</s>
        @endif
        <hr class="my-4 my-lg-5">
        <div class="row">
            <div class="col pb-4 mb-md-0">
                <div class="d-flex text-center justify-content-center align-items-center">
                    <p class="font-weight-normal mb-0">© <a href="{{ config('app.url') }}" target="_blank">{{  config('app.name') }}</a>
                    <span class="current-year">{{ date('Y') }}</span>. {{ _t('All rights reserved') }}.
                </p>
            </div>
        </div>
    </div>
</div>
</footer>