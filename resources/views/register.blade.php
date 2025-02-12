@include('layout.header')
@include('layout.navbar')
{{-- @include('layout.footer') --}}



{{-- Header Section--}}
@yield('header')

{{-- Navbar Section--}}
@yield('navbar')
@include('shared.success-message')
@include('shared.error-message')

<style>
    .card-header {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 58px;
        text-align: center;

        color: #283971;
    }

    .horizontal-line {
        background-color: #283971;
        width: 50%;
        margin: auto;
        border-top: 4px solid #283971 !important;
        border-radius: 14px;
        margin-top: 36px;
        margin-bottom: 62px;
    }

    body {
        margin-left: 100px;
        margin-right: 100px;
        height: 65em;
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

    .register-button {
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

    .register-button:hover {
        background-color: #1e2952;
    }

    #email,
    #password,
    #name {
        border: #1e2952 1px solid;
    }

    #confirm-password-label {
        width: 100%;
    }

    #password-confirm {
        border: #1e2952 1px solid;
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

    .have-account {
        text-align: center;
    }
</style>
<div class="card-header">{{ __('Register') }}</div>
<hr class="horizontal-line">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register.insert') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input placeholder="👤Enter Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input placeholder="📧Enter Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input placeholder="🔑Enter Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" id="confirm-password-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input placeholder="🔑Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="register-button">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="or-separator">
                            <hr>
                            <span>or register with</span>
                            <hr>
                        </div>

                        {{--Sign in With Google--}}
                        <div id="google-button">
                            <a href="{{ route('google.auth') }}" class="btn btn-danger">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>

                        @if (Route::has('login'))
                        <p class="have-account">Already have an account?
                            <a class="login-link" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>