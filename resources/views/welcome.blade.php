<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surat's No.1 local jobs finding for free, Find jobs in surat | jobcito.com</title>
    <meta name="description"
          content="Surat's No.1 Job Finding website for all kind of jobs, Register now to find jobs in surat."/>
    <meta name="keyword"
          content="job finding, job networking site, free employees lead, experienced profiles, IT developers"/>
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
    <link rel="canonical" href="http://jobcito.com/"/>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <meta property="og:title" content="Home">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:description" content="Guaranteed salary increament on your current salary">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta name="twitter:card"
          content="Search best jobs in your city and it's secure and free! Guaranteed salary increment.">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154155495-1"></script>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-154155495-1');
    </script>
</head>
<body>
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<div id="wrapper">
    <header id="header-container" class="fullwidth">

        <!-- Header -->
        <div id="header">
            <div class="container">
                <div class="left-side">
                    <div id="logo">
                        <a href="{{ route('welcome') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="right-side">
                    <nav id="navigation">
                        <ul id="responsive">
                            <li><a href="{{ route('register') }}" class="current">Create Account</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                        </ul>
                    </nav>
                    <span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>
                </div>
            </div>
        </div>
    </header>
    <div class="clearfix"></div>
    <div class="intro-banner dark-overlay" data-background-image="{{ asset('images/home-background-02.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-headline">
                        <h3>
                            <strong>Finding Jobs in Surat is too easy now!</strong>
                            <br>
                            <span>
                                Start building your career now.
                            </span>
                        </h3>
                        <a href="{{ route('register') }}"  class="bg-red button button-sliding-icon ripple-effect">Register</a>
                        <a href="{{ route('login') }}"  class="button button-sliding-icon ripple-effect">Login</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="get" action="{{ route('search') }}">
                        <div class="intro-banner-search-form margin-top-95">
                            <div class="intro-search-field with-autocomplete">
                                <label for="autocomplete-input" class="field-title ripple-effect">Job Title</label>
                                <div class="input-with-icon">
                                    <input id="autocomplete-input" type="text" name="title"
                                           placeholder="e.g. PHP developer, ASP Developer">
                                    <i class="icon-material-outline-location-on"></i>
                                </div>
                            </div>
                            <div class="intro-search-field">
                                <label for="intro-keywords" class="field-title ripple-effect">Location Where?</label>
                                <input id="intro-keywords" type="text" placeholder="e.g. Mumbai, Delhi, 394210"
                                       name="location">
                            </div>
                            <div class="intro-search-button">
                                <button class="button ripple-effect" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ul class="intro-stats margin-top-45 hide-under-992px">
                        <li>
                            <strong class="counter">1,586</strong>
                            <span>Jobs Posted</span>
                        </li>
                        <li>
                            <strong class="counter">2,413</strong>
                            <span>Active Members</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section padding-top-65 padding-bottom-65">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-headline centered margin-top-0 margin-bottom-5">
                        <h3>How It Works?</h3>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="icon-box with-line">
                        <div class="icon-box-circle">
                            <div class="icon-box-circle-inner">
                                <i class="icon-line-awesome-lock"></i>
                                <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
                            </div>
                        </div>
                        <h3>Create an Account</h3>
                        <p>
                            Register yourself and get searched by 1000 of clients and get exiting job offers
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="icon-box with-line">
                        <div class="icon-box-circle">
                            <div class="icon-box-circle-inner">
                                <i class="icon-line-awesome-legal"></i>
                                <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
                            </div>
                        </div>
                        <h3>Apply Job</h3>
                        <p>
                            Filter jobs by job title, location, salary, company reviews, and many more.
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <!-- Icon Box -->
                    <div class="icon-box">
                        <!-- Icon -->
                        <div class="icon-box-circle">
                            <div class="icon-box-circle-inner">
                                <i class=" icon-line-awesome-trophy"></i>
                                <div class="icon-box-check"><i class="icon-material-outline-check"></i></div>
                            </div>
                        </div>
                        <h3>Get Dream Job</h3>
                        <p>
                            Now relax your next dream job offer is one the way. Company will be contact you.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-headline margin-top-0 margin-bottom-35">
                        <h3>Recent Jobs Posted</h3>
                        <a href="{{ route('search', 'all=true') }}" class="headline-link">Browse All Jobs</a>
                    </div>
                    <div class="tasks-list-container compact-list margin-top-35">
                        @forelse($recentJobs as $job)
                            <a href="{{  route('showJob', [$job->id, str_slug($job->title)]) }}" class="task-listing">
                                <div class="task-listing-details">
                                    <div class="task-listing-description">
                                        <h3 class="task-listing-title">
                                            {{ ucwords(strtolower($job->title)) }}
                                        </h3>
                                        <ul class="task-icons">
                                            <li>
                                                <i class="icon-material-outline-location-on"></i>{{ $job->employer->employerProfile->city->city_name ?? 'City Unknown,' }}
                                                ({{ $job->employer->employerProfile->city->state ?? 'State Unknown' }})
                                            </li>
                                            <li>
                                                <i class="icon-material-outline-access-time"></i> {{ $job->created_at->diffForHumans() }}
                                            </li>
                                        </ul>
                                        <div class="task-tags margin-top-15">
                                            @forelse($job->tags as $tag)
                                                <span>{{ $tag->name }}</span>
                                            @empty
                                                <span>No Tags Associated With Job</span>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="task-listing-bid">
                                    <div class="task-listing-bid-inner">
                                        <div class="task-offers">
                                            <strong>INR {{ number_format($job->salary_upto) }}</strong>
                                            <span>Salary Upto</span>
                                        </div>
                                        <span class="button button-sliding-icon ripple-effect">Apply Now
                                            <i class="icon-material-outline-arrow-right-alt"></i>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <a href="javascript:void(0)" class="task-listing">
                                <div class="task-listing-details">
                                    <div class="task-listing-description">
                                        <h3 class="task-listing-title">Sorry No Jobs Found</h3>
                                    </div>
                                </div>
                            </a>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured Jobs / End -->
    <!-- Popular Job Categories -->
    <div class="section margin-top-65 margin-bottom-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-headline centered margin-top-0 margin-bottom-45">
                        <h3>Popular Job Searches</h3>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="task-tags">
                        @foreach($tags as $tag)
                            <span class="home-tags"><a
                                    href="{{ route('search',$tag->slug) }}">{{ $tag->name }}</a></span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Cities / End -->


    <!-- Testimonials -->
    <div class="section gray padding-top-65 padding-bottom-55">

        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Section Headline -->
                    <div class="section-headline centered margin-top-0 margin-bottom-5">
                        <h3>Testimonials</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Carousel -->
        <div class="fullwidth-carousel-container margin-top-20">
            <div class="testimonial-carousel testimonials">

                <!-- Item -->
                <div class="fw-carousel-review">
                    <div class="testimonial-box">
                        <div class="testimonial-avatar">
                            <img src="images/user-avatar-placeholder.png" alt="employer reviews">
                        </div>
                        <div class="testimonial-author">
                            <h4>Mihir Patel</h4>
                            <span>Employer - DarwinsTech</span>
                        </div>
                        <div class="testimonial">
                            Happy to use this free hiring platform. Rather then choosing highly job paid portals,
                            I will recommend this platform. Easy to use and the best thing is you can review bad or fake
                            profiles instantaly.
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="fw-carousel-review">
                    <div class="testimonial-box">
                        <div class="testimonial-avatar">
                            <img src="{{asset('images/user-avatar-placeholder.png')}}" alt="employee reviews">
                        </div>
                        <div class="testimonial-author">
                            <h4>Suraj Tiwari</h4>
                            <span>Job Seeker</span>
                        </div>
                        <div class="testimonial">
                            Recently I found this website from social media page. After simple registration
                            I saw pool of open jobs in surat city. Applied 3 jobs and got 3 companies call. It was
                            amazing
                            experience :D Try your self for better understanding for this platform.
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="fw-carousel-review">
                    <div class="testimonial-box">
                        <div class="testimonial-avatar">
                            <img src="{{asset('images/user-avatar-small-03.jpg')}}" alt="">
                        </div>
                        <div class="testimonial-author">
                            <h4>Mr. Sagar Patel</h4>
                            <span>Tiggy Ventures</span>
                        </div>
                        <div class="testimonial">
                            My startup is now on the track, Thanks for such a great employement networking platform. Now
                            My hiring process is become is easy.
                            Nearby located job seekers
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="fw-carousel-review">
                    <div class="testimonial-box">
                        <div class="testimonial-avatar">
                            <img src="{{asset('images/user-avatar-placeholder.png')}}" alt="">
                        </div>
                        <div class="testimonial-author">
                            <h4>Next, May be You!</h4>
                            <span> ? </span>
                        </div>
                        <div class="testimonial">
                            Begin You Journey From here <a href="{{ route('register') }}">Get Started</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Categories Carousel / End -->

    </div>
    <!-- Testimonials / End -->


    <!-- Counters -->
    <div class="section padding-top-70 padding-bottom-75">
        <div class="container">
            <div class="row">

                <div class="col-xl-12">
                    <div class="counters-container">

                        <!-- Counter -->
                        <div class="single-counter">
                            <i class="icon-line-awesome-suitcase"></i>
                            <div class="counter-inner">
                                <h3><span class="counter">1,586</span></h3>
                                <span class="counter-title">Jobs Posted</span>
                            </div>
                        </div>

                        <!-- Counter -->
                        <div class="single-counter">
                            <i class="icon-line-awesome-user"></i>
                            <div class="counter-inner">
                                <h3><span class="counter">2,413</span></h3>
                                <span class="counter-title">Active Members</span>
                            </div>
                        </div>

                        <!-- Counter -->
                        <div class="single-counter">
                            <i class="icon-line-awesome-trophy"></i>
                            <div class="counter-inner">
                                <h3><span class="counter">68</span>%</h3>
                                <span class="counter-title">Hiring Rate</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">

        <!-- Footer Top Section -->
        <div class="footer-top-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">

                        <!-- Footer Rows Container -->
                        <div class="footer-rows-container">

                            <!-- Left Side -->
                            <div class="footer-rows-left">
                                <div class="footer-row">
                                    <div class="footer-row-inner footer-logo">
                                        <img src="{{asset('images/logo2.png')}}" alt="">
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side -->
                            <div class="footer-rows-right">

                                <!-- Social Icons -->
                                <div class="footer-row">
                                    <div class="footer-row-inner">
                                        <ul class="footer-social-links">
                                            <li>
                                                <a href="https://www.facebook.com/JobCito-103516151179840"
                                                   target="_blank"
                                                   title="Facebook"
                                                   data-tippy-placement="bottom"
                                                   data-tippy-theme="light">
                                                    <i class="icon-brand-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" title="Twitter"
                                                   data-tippy-placement="bottom"
                                                   data-tippy-theme="light">
                                                    <i class="icon-brand-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.linkedin.com/company/jobcito"
                                                   target="_blank"
                                                   title="LinkedIn"
                                                   data-tippy-placement="bottom"
                                                   data-tippy-theme="light">
                                                    <i class="icon-brand-linkedin-in"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                <!-- Language Switcher -->
                                <div class="footer-row">
                                    <div class="footer-row-inner">
                                        <select class="selectpicker language-switcher" data-selected-text-format="count"
                                                data-size="5">
                                            <option selected>English</option>
                                            <option>Français</option>
                                            <option>Español</option>
                                            <option>Deutsch</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Footer Rows Container / End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Top Section / End -->

        <!-- Footer Middle Section -->
        <div class="footer-middle-section">
            <div class="container">
                <div class="row">

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>For Candidates</h3>
                            <ul>
                                <li><a href="{{ route('search', 'all=true') }}"><span>Browse Jobs</span></a></li>
                                <li><a href="{{ route('search', 'all=latest') }}"><span>Job Alerts</span></a></li>
                                <li><a href="{{ route('login') }}"><span>My Applied Jobs</span></a></li>
                                <li><a href="#small-dialog" data-backdrop="static" data-keyboard="false"
                                       class="popup-with-zoom-anim margin-bottom-50">Feedback </a></li>

                            </ul>
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>For Employers</h3>
                            <ul>
                                <li><a href="{{ route('login') }}"><span>Browse Candidates</span></a></li>
                                <li><a href="{{ route('jobs.create') }}"><span>Post a Job</span></a></li>
                                <li><a href="#small-dialog" class="popup-with-zoom-anim margin-bottom-50">Feedback </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Links -->
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>Helpful Links</h3>
                            <ul>
                                <li><a href="{{ route('contact.index') }}"><span>Contact</span></a></li>
                                @foreach($slugs as $slug)
                                    <li>
                                        <a href="{{ route('page.show', $slug->title) }}"><span>{{ucfirst(str_replace('-',' ',$slug->title))}}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>Account</h3>
                            <ul>
                                <li><a href="{{ route('login') }}"><span>Log In</span></a></li>
                                <li><a href="{{ route('employee.dashboard') }}"><span>My Account</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12" id="subscriber-form">
                        <h3><i class="icon-feather-mail"></i> Sign Up For a Newsletter</h3>
                        <p>Weekly breaking news, analysis and cutting edge advices on job searching.</p>
                        <form method="post" class="newsletter" id="newsletter">
                            @csrf
                            <input type="email" name="subscriber_email" placeholder="Enter your email address">
                            <button type="submit"><i class="icon-feather-arrow-right"></i></button>
                        </form>
                        <p class="invalid-input" id="email-errors" style="color: red;"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        Powered By <a href="https://darwinstech.com/" target="_blank">Darwins Tech</a> © {{ date('Y') }}
                        <strong>JobCito</strong>.
                        All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
        @include('components.feedback')
    </div>
</div>
<script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{ asset('js/mmenu.min.js')}}"></script>
<script src="{{ asset('js/tippy.all.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-slider.min.js')}}"></script>
<script src="{{ asset('js/magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/clipboard.min.js')}}"></script>
<script src="{{ asset('js/snackbar.js')}}"></script>
<script src="{{ asset('js/slick.min.js')}}"></script>
<script src="{{ asset('js/counterup.min.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
<script>
    $(window).on('load', function () { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow': 'visible'});
    })
    $('#feedback-message').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: '{{route('feedback.store')}}',
            type: 'POST',
            data: $('#feedback-message').serialize(),
            success: function (data) {
                $('#feedback-message')[0].reset();
                Snackbar.show({
                    text: data.success,
                    pos: 'bottom-center',
                    showAction: true,
                    actionText: '&times',
                    duration: 3000,
                    textColor: '#fff',
                    backgroundColor: '#38b653'
                });
                $('#error').empty();
                $('.mfp-close').click();
            },
            error: function (data) {
                $("#error").html(data.responseJSON.errors.message);
                $('#message').empty();
            }
        });
    });
    $('#newsletter').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route("subscriber.store") }}',
            method: 'POST',
            data: $('#newsletter').serialize(),
            success: function (data) {
                $('#newsletter').fadeOut();
                $('#subscriber-form').html('Great! Now we\'ll be in touch!');
            },
            error: function (error) {
                var formErrors = error.responseJSON.errors;
                $('#email-errors').text('');
                if (formErrors.subscriber_email[0] != '') {
                    $('#email-errors').text(formErrors.subscriber_email[0]);
                }
            }
        });
    });
</script>
</body>
</html>
