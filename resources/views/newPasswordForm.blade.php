@include('layout.header')
@include('layout.navbar')
{{-- @include('layout.footer') --}}



{{-- Header Section--}}
@yield('header')

{{-- Navbar Section--}}
@yield('navbar')

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
        margin-bottom: 30px;
    }

    body {
        margin-left: 100px;
        margin-right: 100px;
        height: 60em;
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

<div class="card-header">{{ __('PASSWORD RESET') }}</div>
<hr class="horizontal-line">
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6 my-3 py-3">
            @include('shared.success-message')
            @include('shared.error-message')
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="ChangePassword" class="col-md-4 col-form-label text-md-right">{{ __('Change Password') }}</label>

                            <div class="col-md-12">
                                {{--Password Reset Inputs: Email New password, Confirm New Password, Token--}}
                                <input type="hidden" name="token" value="{{ $token }}">
                                {{--get hidden email for url token--}}
                                <input type="hidden" name="email" value="{{ $email }}">
                                {{--Password Reset Inputs: Email New password, Confirm New Password, Token--}}
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autofocus placeholder="New Password">
                                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autofocus placeholder="Confirm New Password">
                                
                                
                            </div>
                        </div>

                        

                        <div id="remember-me">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                      

                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="login-button">
                                    {{ __('RESET PASSWORD') }}
                                </button>


                               

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