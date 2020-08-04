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
                        <a href="{{ route('welcome') }}"><img src="{{ asset('images/logo.png') }}" alt="" height="80px"></a>
                    </div>
                    <h3>First, let's find your account</h3>
                    <span>Please enter your email or cancel & <a href="{{ route('login') }}">Login!</a></span>
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
                <form method="POST" action="{{ route('password.email') }}" id="login-form">
                    @csrf
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="email" class="input-text with-border" name="email" id="email"
                               placeholder="Email Address" required autofocus autocomplete="email"/>
                    </div>
                    <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit">
                        Find Account
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
