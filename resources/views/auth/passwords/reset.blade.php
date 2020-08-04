<!doctype html>
<html lang="en">
<head>
    <title>Login corporate.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css') }}">
    <style>
        .is-invalid{
            border-color: #dc3545;
            padding-right: calc(1.5em + .75rem);

            background-repeat: no-repeat;
            background-position: center right calc(.375em + .1875rem);
            background-size: calc(.75em + .375rem) calc(.75em + .375rem)
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div class="container">
    <div class="row">
        <div class="col-xl-5 offset-xl-3">
            <div class="login-register-page">
                <div class="welcome-text">
                    <div class="company-logo margin-top-10 margin-bottom-10">
                        <a href="index.html"><img src="{{ asset('images/logo.png') }}" alt="" height="80px"></a>
                    </div>
                    <h3>We Found Your Account :)</h3>
                    <span>No You can create new password</span>
                </div>
                @if (session('status'))
                    <div class="notification success closeable">
                        <p></p>{{ session('status') }}</p>
                        <a class="close"></a>
                    </div>
                @endif
                @error('email')
                <div class="notification error closeable">
                    <p>{{ $message }}</p>
                    <a class="close"></a>
                </div>
                @enderror
                @error('password')
                <div class="notification error closeable">
                    <p>{{ $message }}</p>
                    <a class="close"></a>
                </div>
                @enderror
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="email" class="input-text with-border" name="email" id="email"
                               placeholder="Email Address" required value="{{ $email ?? old('email') }}"/>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="password" class="input-text with-border" name="password" id="password"
                               placeholder="Enter New Password" required autofocus autocomplete="email"/>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="password" class="input-text with-border" name="password_confirmation"
                               id="password_confirmation"
                               placeholder="Repeat Password" required/>
                    </div>
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">
                        {{ __('Reset Password') }}
                        <i class="icon-material-outline-arrow-right-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>

