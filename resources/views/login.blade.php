@include('layout.header')
@include('layout.navbar')
{{-- @include('layout.footer') --}}



{{-- Header Section--}}
@yield('header')

{{-- Navbar Section--}}
@yield('navbar')

<style>
    .card-header {
        font-family: 'Inter', serif;
        font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 58px;
        text-align: center;

        color: #283971;
    }

    .horizontal-line {
        background-color: #283971;
        color: #283971;
        width: 50%;
        border-top: 4px solid #283971 !important;
        border-radius: 14px;
        margin: 36px auto 30px;
    }

    body {
        margin-left: 100px;
        margin-right: 100px;
        height: 20em;
    }

    label {
        font-family: 'Inter';
        font-style: normal;
        color: #283971;
        font-weight: 700;
    }

    p {
        font-family: 'Inter';
        font-style: normal;
        color: #283971;
    }

    input {
        width: 40%;
        padding: 8px 12px;
        border: 3px solid #1e2952;
        background-size: 20px;
    }

    ::placeholder {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 500;
        font-size: 13px;
        line-height: 16px;
        letter-spacing: 0.205em;

        color: rgba(40, 57, 113, 0.47);
    }

    .card {
        box-shadow: 5px 5px 10px 0 rgba(0, 0, 0, 0.5);
    }

    .container {
        justify-content: center;
        width: 80%;
    }

    .form-check {
        margin-top: 10px;
        width: 50%;
    }

    .form-check-input {
        width: 4px;
    }

    #remember-me {
        margin-top: 10px;
        margin-left: 3px;
        margin-bottom: 10px;
    }

    #remember-me-label {
        margin-left: 10px;
    }

    .login-button {
        display: block;
        width: 100%;
        max-width: 300px;
        margin: 20px auto;
        /* Center horizontally */
        padding: 10px;
        text-align: center;
        background-color: #283971;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-button:hover {
        background-color: #1e2952;
    }

    .or-separator {
        text-align: center;
        margin: 20px 0;
    }

    .or-separator hr {
        width: 20%;
        display: inline-block;
        border-top: 2px solid #283971;
        margin: 0 10px;
    }

    .or-separator span {
        font-weight: bold;
        color: #283971;
    }

    #google-button {
        text-align: center;
        margin-bottom: 50px;
    }

    .no-account {
        text-align: center;
    }

    .form-check-input {
        border: #1e2952 1px solid;
    }

    #email, #password {
        border: #1e2952 1px solid;
    }
</style>
{{-- Login Section--}}

<div class="card-header">{{ __('Login') }}</div>
<hr class="horizontal-line">
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6 my-3 py-3">
            @include('shared.success-message')
            @include('shared.error-message')
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="📧Enter Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="🔑Enter Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div id="remember-me">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link primary" style="margin-left: -12px;" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="login-button">
                                    {{ __('Login') }}
                                </button>


                                <div class="or-separator">
                                    <hr>
                                    <span>or login with</span>
                                    <hr>
                                </div>


                                {{--Sign in With Google--}}
                                <div id="google-button">
                                    <a href="{{ route('google.auth') }}" class="btn btn-danger">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </div>
                                <!-- @if (Route::has('register.view'))
                                <p class="no-account">Don't have an account?
                                    <a class="register-link" href="{{ route('register.view') }}">
                                        {{ __('Register') }}
                                    </a>
                                </p>
                                @endif -->

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Footer Section--}}
{{-- @yield('footer') --}}
@include('layout.scripts')