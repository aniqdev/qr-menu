@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/css/argon-design-system.min.css">
<style>
main{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    margin-top: -54px;
    overflow: auto;
}
.google-icon{
    background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 48 48'%3E%3Cdefs%3E%3Cpath id='a' d='M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z'/%3E%3C/defs%3E%3CclipPath id='b'%3E%3Cuse xlink:href='%23a' overflow='visible'/%3E%3C/clipPath%3E%3Cpath clip-path='url(%23b)' fill='%23FBBC05' d='M0 37V11l17 13z'/%3E%3Cpath clip-path='url(%23b)' fill='%23EA4335' d='M0 11l17 13 7-6.1L48 14V0H0z'/%3E%3Cpath clip-path='url(%23b)' fill='%2334A853' d='M0 37l30-23 7.9 1L48 0v48H0z'/%3E%3Cpath clip-path='url(%23b)' fill='%234285F4' d='M48 48L17 24l-4-3 35-10z'/%3E%3C/svg%3E");
    width: 20px;
    height: 20px;
    display: inline-block;
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
        <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-3 col-md-8 offset-md-2 ">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{ _t('auth.login') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div id="firebaseui_auth_container"></div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="">

                            <div class="form-group">
                                <label class="form-control-label" for="name_owner">{{ _t('auth.email') }}</label>
                                <input type="text" id="name_owner" class="form-control form-control-alternative @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="{{ _t('auth.email') }} ..." autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="password">{{ _t('auth.password') }}</label>
                                <input type="password" name="password" id="password" class="form-control form-control-alternative @error('password') is-invalid @enderror" placeholder="{{ _t('auth.password') }} ...">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" checked>
                                        <label class="custom-control-label" for="customCheckLogin">
                                            <span class="text-muted">{{ _t('auth.remember_me') }}</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-light">
                                            <small>{{ _t('auth.forgot_password') }}</small>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" id="thesubmitbtn" class="btn btn-success mt-4 me-0 mb-3">{{ _t('auth.login') }}</button>
                                <br>{{ _t('auth.or') }}
                            </div>
                            <div class="text-center">
                                <button type="button" id="" onclick="googleAuth(this)" name="{{ route('google-login') }}" class="btn btn-secondary mt-4 d-inline-flex align-items-center bg-white">
                                    <span class="google-icon me-2"></span>
                                    <span>{{ _t('auth.google_login') }}</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-auth.js"></script>
<script>
var log = console.log
const firebaseConfig = {
  apiKey: "AIzaSyDx_Hb3_jLvZhMIqYNLMsE3AZq8wg61pgI",
  authDomain: "qr-menu-space.firebaseapp.com",
  projectId: "qr-menu-space",
  storageBucket: "qr-menu-space.appspot.com",
  messagingSenderId: "654161566444",
  appId: "1:654161566444:web:db75f1a6c090ee3297e3c9",
  measurementId: "G-PYESWJE02N"
};
firebase.initializeApp(firebaseConfig);

const provider = new firebase.auth.GoogleAuthProvider();
provider.setCustomParameters({ prompt: "select_account" });

function googleAuth(button){
    firebase.auth()
      .signInWithPopup(provider)
      .then((result) => {
        if(result.credential && result.credential.accessToken){
            googleLogin(button.name, result.credential.accessToken)
        }
        // var user = result.user;
      }).catch((error) => {
        console.error(error)
      });
}

function googleLogin(googleLoginUrl, accessToken){
    location.href = googleLoginUrl + '?access_token=' + encodeURIComponent(accessToken)
}

</script>
@include('auth.footer')
@endsection

