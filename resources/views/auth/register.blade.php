@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/argon-design-system.min.css">
{{-- <link rel="stylesheet" href="/css/register.css"> --}}
<style>
select.form-control {
    appearance: auto;
}
</style>
<div class="wrapper">
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(/images/cover.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-md-12 ">
                    <h1 class="display-2 text-white"></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row"></div>
        <div class="col-xl-6 offset-xl-3">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{ _t('auth.register_you_company') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <script>
                       function gOnSubmit(token) {
                         document.getElementById("register_form").submit();
                       }
                    </script>
                    <form method="POST" action="{{ route('register') }}" autocomplete="off" id="register_form">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">{{ _t('auth.company_information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="company_name">{{ _t('auth.company_name') }}</label>
                                <input type="text" name="company_name" id="company_name" class="form-control form-control-alternative" placeholder="Restaurant Name here ..." value="{{ old('company_name') }}" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group pl-lg-4">
                                    <label class="form-control-label" for="menu_lang">{{ _t('auth.menu_lang') }}</label>
                                    <select name="menu_lang" id="" class="form-control form-control-alternative">
                                        <option value="uk">Ukrainian</option>
                                        <option value="en">English</option>
                                        <option value="ru">Russian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-control-label">&nbsp;</label>
                                <div class="pl-lg-4_">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" name="demo_content" id="customCheckLogin" type="checkbox">
                                        <label class="custom-control-label" for="customCheckLogin">
                                            <span class="text-muted">{{ _t('auth.demo_content') }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-4">{{ _t('auth.owner_information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="owner_name">{{ _t('auth.owner_name') }}</label>
                                <input type="text" name="owner_name" id="owner_name" class="form-control form-control-alternative" placeholder="{{ _t('auth.owner_name') }} ..." value="{{ old('owner_name', session('name')) }}">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">{{ _t('auth.owner_email') }}</label>
                                        <input type="text" name="email" id="email" class="form-control form-control-alternative" placeholder="{{ _t('auth.owner_email') }} ..." value="{{ old('email', session('email')) }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">{{ _t('admin_profile.password') }}</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-alternative" placeholder="{{ _t('admin_profile.password') }} ..." value="">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="g-recaptcha btn btn-success mt-4" data-sitekey="{{ config('app.recaotcha_site') }}" data-callback="gOnSubmit">{{ _t('auth.create') }}</button>
                            </div>
                            <div class="text-center mt-4">
                                <span>{{ _t('auth.login_suggestion') }}</span>
                                <a href="{{ route('login') }}">{{ _t('auth.login') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@include('auth.footer')
@endsection
