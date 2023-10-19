@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/argon-design-system.min.css">
{{-- <link rel="stylesheet" href="/css/register.css"> --}}
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
                    <form id="registerform" method="post" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <h6 class="heading-small text-muted mb-4">{{ _t('auth.company_information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="company_name">{{ _t('auth.company_name') }}</label>
                                <input type="text" name="company_name" id="company_name" class="form-control form-control-alternative" placeholder="Restaurant Name here ..." value="{{ old('company_name') }}" required autofocus>
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
                                        <input type="text" name="email" id="email" class="form-control form-control-alternative" placeholder="{{ _t('auth.owner_email') }} ..." value="{{ old('email', session('email')) }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">{{ _t('admin_profile.password') }}</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-alternative" placeholder="{{ _t('admin_profile.password') }} ..." value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="thesubmitbtn" class="btn btn-success mt-4">{{ _t('auth.create') }}</button>
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




@section('content_')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ _t('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ _t('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ _t('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ _t('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ _t('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ _t('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
