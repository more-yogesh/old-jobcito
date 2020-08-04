<!doctype html>
<html lang="en">
<head>
    <title>Register | {{ env('APP_NAME') }} | Surat's No.1 Job Service Provider| Free Jobs Service In Surat | Register Free</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css')}}">
    <meta property="og:title" content="Get job calls from surat's no.1 Free job platform"/> 
		<meta property="og:type" content="post"/>
		<meta property="og:url" content="{{env('APP_URL')}}/register"/>
		<meta property="og:site_name" content="jobcito"/>
		<meta property="og:description" content="Surat's No.1 Job service provder"/>
		<meta property="og:image" content="{{ asset('images/og-image.png') }}"/>
    <style>
        select {
            padding: 9px 17px;
            cursor: pointer;
            margin-right: 5px;
        }
    </style>
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 offset-xl-3">
                <div class="login-register-page">
                    <div class="welcome-text margin-top-25">
                        <div class="company-logo margin-bottom-10">
                            <a href="{{ route('welcome') }}">
                                <img src="{{ asset('images/logo.png')}}" alt="" height="50px">
                            </a>
                        </div>
                        <h3 style="font-size: 26px;">Create Your Account For Free & Get Interview Calls From Our Trusted Companies</h3>
                        <span>Already have an account? <a href="{{ route('login') }}">Login!</a>
                        </span>
                    </div>
                    @error('email')
                    <div class="notification error closeable">
                        <p>{{ $message }}</p>
                        <a class="close"></a>
                    </div>
                    @enderror
                    @error('password')
                    <div class="notification error closeable">
                        <p>{{ $errors->first('password') }}</p>
                        <a class="close"></a>
                    </div>
                    @enderror
                     @error('day')
                    <div class="notification error closeable">
                        <p>{{ $errors->first('day') }}</p>
                        <a class="close"></a>
                    </div>
                    @enderror
                    @error('month')
                    <div class="notification error closeable">
                        <p>{{ $errors->first('month') }}</p>
                        <a class="close"></a>
                    </div>
                    @enderror
                    @error('year')
                    <div class="notification error closeable">
                        <p>{{ $errors->first('year') }}</p>
                        <a class="close"></a>
                    </div>
                    @enderror
                    @error('mobile')
                    <div class="notification error closeable">
                        <p>{{ $errors->first('mobile') }}</p>
                        <a class="close"></a>
                    </div>
                    @enderror
                    <form method="post" id="register-account-form" action="{{ route('register') }}">
                        @csrf
                        <div class="account-type" style="display:none;">
                            <div>
                                <input type="radio" name="role" id="freelancer-radio"
                                       class="account-type-radio"
                                       value="employee" checked/>
                                <label for="freelancer-radio" class="ripple-effect-dark"><i
                                        class="icon-material-outline-account-circle"></i> Looking For Job</label>
                            </div>
                            <div>
                                <input type="radio" name="role" id="employer-radio" class="account-type-radio"
                                       value="employer" {{ old('role') == 'employer' ? 'checked' : '' }} {{ request('employer') == 'true' ? 'checked': '' }}/>
                                <label for="employer-radio" class="ripple-effect-dark"><i
                                        class="icon-material-outline-business-center"></i> Recruiter</label>
                            </div>
                        </div>
                        <div>
                            @error('role')
                            <div class="notification error closeable">
                                <p>{{ $message }}</p>
                                <a class="close"></a>
                            </div>
                            @enderror
                            <div class="input-with-icon-left">
                                <i class="icon-feather-user-check"></i>
                                <input type="text" class="input-text with-border" name="name"
                                       id="name" placeholder="Enter Your Name" required autofocus autocomplete="name"
                                       value="{{ old('name') }}"/>
                            </div>
                            <div class="input-with-icon-left">
                                <i class="icon-material-baseline-mail-outline"></i>
                                <input type="email" class="input-text with-border" name="email"
                                       id="email" placeholder="Email Address" required
                                       value="{{ old('email') }}"/>
                            </div>
                            
                            <div class="input-with-icon-left">
                                <i class="icon-feather-phone-call"></i>
                                <input type="number" class="input-text with-border" name="mobile"
                                       id="mobile" placeholder="Enter Mobile Number" required
                                       value="{{ old('mobile') }}"/>
                            </div>
                            <div class="row" style="margin-right:0px;margin-left:0px;">
                                <!--<div class="col-12">-->
                                    <select name="day" required class="with-border col">
                                        <option value="">Day</option>
                                        @foreach(range(1,31) as $day)
                                            <option value="{{$day}}">{{$day}}</option>
                                        @endforeach
                                    </select>
                                    <select name="month" required class="with-border col">
                                        <option value="">Month</option>
                                        @foreach(range(1,12) as $month)
                                            <option value="{{$month}}">{{$month}}</option>
                                        @endforeach
                                    </select>
                                    <select name="year" required class="with-border col">
                                        <option value="">Year</option>
                                        @foreach(range(1970, date('Y')) as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                        @endforeach
                                    </select>
                                <!--</div>-->
                            </div>
                            <div class="">
								<div class="checkbox">
									<input type="checkbox" id="two-step" checked="">
									<label for="two-step"><span class="checkbox-icon">
									</span> you accept our Terms and Conditions and Privacy Policy</label>
								</div>
							</div>
                            <!--<div class="input-with-icon-left" title="Should be at least 6 characters long"-->
                            <!--     data-tippy-placement="bottom">-->
                            <!--    <i class="icon-material-outline-lock"></i>-->
                            <!--    <input type="password" class="input-text with-border" name="password"-->
                            <!--           id="password" placeholder="Password" required/>-->
                            <!--</div>-->

                            <!--<div class="input-with-icon-left">-->
                            <!--    <i class="icon-material-outline-lock"></i>-->
                            <!--    <input type="password" class="input-text with-border" name="password_confirmation"-->
                            <!--           id="password_confirmation" placeholder="Repeat Password" required/>-->
                            <!--</div>-->

                            <button class="button full-width button-sliding-icon ripple-effect margin-top-10"
                                    type="submit" id="btn-register">
                                Register <i class="icon-material-outline-arrow-right-alt"></i>
                            </button>
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
    // socialSwitcher($('.account-type-radio').val());
    // $(document).ready(function () {
    //     $('[name="role"]').change(function () {
    //         $('#show-form').fadeIn();
    //         socialSwitcher($(this).val());
    //         $('#btn-register').css("width", "100%");
    //     });
    // });

    // function socialSwitcher(type) {
    //     let originalFacebookURL = '{{ url('/login/facebook') }}';
    //     let originalGoogleURL = '{{ url('/login/google') }}';
    //     if (type == 'employer') {
    //         $('#facebook').attr('href', originalFacebookURL + '?role=employer');
    //         $('#google').attr('href', originalGoogleURL + '?role=employer');
    //     } else {
    //         $('#facebook').attr('href', originalFacebookURL + '?role=employee');
    //         $('#google').attr('href', originalGoogleURL + '?role=employee');
    //     }
    // }
</script>
</body>
</html>
