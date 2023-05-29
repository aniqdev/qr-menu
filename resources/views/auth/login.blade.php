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
                        <h3 class="col-12 mb-0">Login</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div id="firebaseui_auth_container"></div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="">

                            <div class="form-group">
                                <label class="form-control-label" for="name_owner">Email</label>
                                <input type="text" id="name_owner" class="form-control form-control-alternative @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Email ..." autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-alternative @error('password') is-invalid @enderror" placeholder="Password ...">
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
                                                    <span class="text-muted">{{ __('Remember me') }}</span>
                                                </label>
                                            </div>
                                </div>
                                <div class="col-6 text-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-light">
                                            <small>{{ __('Forgot password?') }}</small>
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" id="thesubmitbtn" class="btn btn-success mt-4">Login</button>
                            </div>
                            <div class="text-center">
                                <button type="button" id="" onclick="googleAuth(this)" name="{{ route('google-login') }}" class="btn btn-primary mt-4">Google Login</button>
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




@section('content_')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
