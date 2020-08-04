<!doctype html>
<html lang="en">
<head>
    <title>Login corporate.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css') }}">
    <style>
        .bg-fb {
            background: #3a63bf !important;
        }

        .bg-gplus {
            background: #c94131 !important;
        }
    </style>
</head>
<body>
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">
                <div class="login-register-page">
                    <!-- Welcome Text -->
                    <div class="welcome-text">
                        <div class="company-logo margin-top-10 margin-bottom-10">
                            <a href="{{ route('welcome') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="" height="50px">
                            </a>
                        </div>
                        <h3>We're glad to see you again!</h3>
                        <span>Don't have an account? <a href="{{ route('register') }}">Register!</a></span>
                    </div>
                    @error('email')
                    <div class="notification error closeable">
                        <p>{{ $message }}</p>
                        <a class="close"></a>
                    </div>
                    @enderror

                    <form method="POST" action="{{ route('login') }}" id="login-form">
                        @csrf
                        <div class="account-type">
                            <div>
                                <input type="radio" name="role" id="freelancer-radio"
                                       class="account-type-radio"
                                       value="employee" {{ old('role') == 'employee' ? 'checked' : '' }}/>
                                <label for="freelancer-radio" class="ripple-effect-dark"><i
                                        class="icon-material-outline-account-circle"></i> Job Seeker</label>
                            </div>
                            <div>
                                <input type="radio" name="role" id="employer-radio" class="account-type-radio"
                                       value="employer" {{ old('role') == 'employer' ? 'checked' : '' }} {{ request('employer') == 'true' ? 'checked': '' }}/>
                                <label for="employer-radio" class="ripple-effect-dark">
                                    <i class="icon-material-outline-business-center"></i> Recruiter
                                </label>
                            </div>
                        </div>
                        <div id="show-form" @if($errors->isEmpty()) style="display: none" @endif>
                            <div class="input-with-icon-left">
                                <i class="icon-material-baseline-mail-outline"></i>
                                <input type="text"
                                       class="input-text with-border is-invalid @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}" name="email" id="emailaddress"
                                       placeholder="Email Address"
                                       required autocomplete="email" autofocus/>
                            </div>
                            <div class="input-with-icon-left">
                                <i class="icon-material-outline-lock"></i>
                                <input type="password"
                                       class="input-text with-border @error('password') is-invalid @enderror"
                                       name="password" id="password"
                                       placeholder="Password" required/>
                            </div>
                            <div class="checkbox d-none">
                                <input class="" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : 'checked' }}>
                                <label class="form-check-label" for="remember">
                                    <span class="checkbox-icon"></span>
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                                <button class="button full-width button-sliding-icon ripple-effect margin-top-10" id="login-btn">
                                    Log In <i class="icon-material-outline-arrow-right-alt"></i>
                                </button>
                            <div class="welcome-text margin-top-20">
                                @if (Route::has('password.request'))
                                    <a class="forgot-password" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="social-login-separator"><span>or</span></div>
                            @include('components.social-login')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="margin-top-70"></div>
</div>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script>
    socialSwitcher($('.account-type-radio').val());
    $(document).ready(function () {
        $('[name="role"]').change(function () {
            $('#show-form').fadeIn();
            socialSwitcher($(this).val());
            $('#login-btn').css("width", "100%");
        });
    });

    function socialSwitcher(type) {
        let originalFacebookURL = '{{ url('/login/facebook') }}';
        let originalGoogleURL = '{{ url('/login/google') }}';
        if (type == 'employer') {
            $('#facebook').attr('href', originalFacebookURL + '?role=employer');
            $('#google').attr('href', originalGoogleURL + '?role=employer');
        } else {
            $('#facebook').attr('href', originalFacebookURL + '?role=employee');
            $('#google').attr('href', originalGoogleURL + '?role=employee');
        }
    }
</script>
</body>
</html>
