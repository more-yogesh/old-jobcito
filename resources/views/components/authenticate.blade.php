<div id="small-dialog-1" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <div class="sign-in-form">
        <ul class="popup-tabs-nav">
            <li><a href="#register">Register</a></li>
            <li><a href="#login">Login</a></li>
        </ul>
        <div class="popup-tabs-container">
            <div class="popup-tab-content" id="register">
                <div class="welcome-text">
                    <h3>Register Now It'll Take Few Minutes</h3>
                </div>
                <form method="post" id="register-form">
                    @csrf
                    <input type="hidden" name="role" value="employee">
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="email" class="input-text with-border" name="email" id="email"
                               placeholder="Email Address" required/>
                        <span id="email-error" class="invalid-input">

                        </span>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-lock"></i>
                        <input type="password" class="input-text with-border" name="password" id="password"
                               placeholder="Password" required/>
                        <span id="password-error" class="invalid-input">

                        </span>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-lock"></i>
                        <input type="password" class="input-text with-border" name="password_confirmation"
                               id="password_confirmation"
                               placeholder="Repeat Password" required/>
                    </div>
                    <button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">
                        Register
                        <i class="icon-material-outline-arrow-right-alt"></i>
                    </button>
                </form>
                <div class="social-login-separator"><span>Or</span></div>
                @include('components.social-login')
            </div>
            <div class="popup-tab-content" id="login">
                <div class="welcome-text">
                    <h3>
                        Login Now To Apply
                    </h3>
                </div>
                <form method="post" id="login-form">
                    @csrf
                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-account-circle"></i>
                        <input type="email" class="input-text with-border" name="email" id="login-email"
                               placeholder="Your Email Address" required autofocus/>
                        <span id="login-error" class="invalid-input">

                        </span>
                    </div>
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="password" class="input-text with-border" name="password" id="login-password"
                               placeholder="Enter Your Password" required/>
                    </div>
                    <button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit">
                        Login
                        <i class="icon-material-outline-arrow-right-alt"></i>
                    </button>
                </form>
                {{--                <div id="social-area">--}}
                {{--                    <div class="social-login-separator"><span>or</span></div>--}}
                {{--                    <div class="social-login-buttons">--}}
                {{--                        <a href="{{ url('/login/facebook') }}" class="facebook-login ripple-effect">--}}
                {{--                            <i class="icon-brand-facebook-f"></i> Connect via--}}
                {{--                            Facebook--}}
                {{--                        </a>--}}
                {{--                        <a href="{{ url('/login/google') }}" class="google-login ripple-effect">--}}
                {{--                            <i class="icon-brand-google"></i> Connect via Google--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="social-login-separator"><span>Or</span></div>
                @include('components.social-login')
            </div>
        </div>
    </div>
</div>
@section('js-hooks')
    <script>
        $(document).ready(function () {
            $('#register-form').submit(function (event) {
                event.preventDefault();
                console.log($('#register-form').serialize());
                $.ajax({
                    method: 'POST',
                    url: '{{ route('register') }}',
                    data: $('#register-form').serialize()
                    ,
                    success: function (data) {
                        window.location.reload();
                    },
                    error: function (error) {
                        if (error.responseJSON.errors == undefined) {
                            window.location = '{{ route('employee.dashboard') }}';
                        }
                        var formErrors = error.responseJSON.errors;
                        $('#email-error').text('');
                        $('#password-error').text('');
                        if (formErrors.password) {
                            $('#password-error').text(formErrors.password);
                        }
                        if (formErrors.email) {
                            $('#email-error').text(formErrors.email);
                        }
                    }
                });
            });
            $('#login-form').submit(function (event) {
                event.preventDefault();
                console.log($('#login-form').serialize());
                $.ajax({
                    method: 'POST',
                    url: '{{ route('login') }}',
                    data: $('#login-form').serialize(),
                    success: function (data) {
                        window.location.reload();
                    },
                    error: function (error) {
                        var formErrors = error.responseJSON.errors.email[0];
                        $('#login-email').text('');
                        if (formErrors) {
                            $('#login-error').text(formErrors);
                        }
                    }
                });
            });
        });
    </script>
@endsection
