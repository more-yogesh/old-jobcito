<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
   
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1"/>
    <link rel="canonical" href="@yield('canonical_url')"/>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/colors/blue.css')}}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @yield('css-hooks')
    @stack('component-css')
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154155495-1"></script>
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
        @guest
            <div id="header">
                <div class="container">
                    <div class="left-side">
                        <div id="logo">
                            <a href="{{ route('welcome') }}">
                                <img src="{{ asset('images/logo.png') }}" alt="logo">
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="right-side">
                        <nav id="navigation">
                            <ul id="responsive">
                                <li>
                                    <a href="{{ route('login') }}" class="current">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" class="btn btn-default">Registration</a>
                                </li>
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
        @endguest
        @auth
            @role('employee')
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="{{ route('employee.dashboard')  }}"><img src="{{ asset('images/logo.png')}}"
                                                                              alt=""></a>
                        </div>
                        <nav id="navigation">
                            <ul id="responsive">
                                <li>
                                    <a href="{{ route('employee.dashboard') }}">Dashboard</a>
                                </li>
                                <li>
                                    <a href="{{ route('search') }}">Find Job</a>
                                </li>
                                <li>
                                    <a href="#small-dialog" data-backdrop="static" data-keyboard="false"
                                       class="popup-with-zoom-anim"><span>Feedback</span></a>
                                </li>
                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                    </div>
                    <div class="right-side">
                        <div class="header-widget hide-on-mobile">
                            <div class="header-notifications">
                                <div class="header-notifications-trigger">
                                    <a href="javascript:void(0)">
                                        <i class="icon-feather-bell"></i><span id="notification-counts">0</span>
                                    </a>
                                </div>
                                <div class="header-notifications-dropdown">
                                    <div class="header-notifications-headline">
                                        <h4>Notifications</h4>
                                    </div>
                                    <div class="header-notifications-content">
                                        <div class="header-notifications-scroll" data-simplebar>
                                            @include('components.notification')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-notifications">
                                <div class="header-notifications-trigger">
                                    <a href="#"><i class="icon-feather-mail"></i><span>0</span></a>
                                </div>
                                <div class="header-notifications-dropdown">
                                    <div class="header-notifications-headline">
                                        <h4>Messages</h4>
                                    </div>
                                    <div class="header-notifications-content">
                                        <div class="header-notifications-scroll" data-simplebar>
                                            <ul>
                                                <li class="notifications-not-read">
                                                    <a href="javascript:void(0)">
                                                        <div class="notification-text">
                                                            <strong>Empty Inbox</strong>
                                                            <p class="notification-msg-text">
                                                                No New Message Yet
                                                            </p>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)"
                                       class="header-notifications-button ripple-effect button-sliding-icon">No
                                        Messages<i class="icon-material-outline-arrow-right-alt"></i></a>
                                </div>
                            </div>

                        </div>
                        <div class="header-widget">
                            <div class="header-notifications user-menu">
                                <div class="header-notifications-trigger">
                                    <a href="#">
                                        <div class="user-avatar status-online"><img
                                                src="{{asset('images/user-avatar-small-01.jpg')}}" alt=""></div>
                                    </a>
                                </div>
                                <div class="header-notifications-dropdown">
                                    <div class="user-status">
                                        <div class="user-details">
                                            <div class="user-avatar status-online">
                                                @if(auth()->user()->employee->getFirstMediaUrl('profiles', 'thumb'))
                                                    <img
                                                        src="{{ auth()->user()->employee->getFirstMediaUrl('profiles', 'thumb')  }}"
                                                        alt="{{ auth()->user()->employee->name ?? 'unknown' }}">
                                                @else
                                                    <img src="{{ asset('images/avatar.gif')}}"
                                                         alt="{{ auth()->user()->employee->name ?? 'unknown' }}">
                                                @endif
                                            </div>
                                            <div class="user-name">
                                                {{ auth()->user()->employee->name ?? 'Update Profile' }}
                                                <span>
                                                    {{ auth()->user()->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="status-switch" id="snackbar-user-status">
                                            <label
                                                class="user-online {{ auth()->user()->employee->looking_job == 'yes' ? 'current-status' : '' }}">JobSearchON</label>
                                            <label
                                                class="user-invisible {{ auth()->user()->employee->looking_job == 'no' ? 'current-status' : '' }}">JobSearchOFF</label>
                                            <span
                                                class="status-indicator {{ auth()->user()->employee->looking_job == 'no' ? 'right' : '' }}"
                                                aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <ul class="user-menu-small-nav">
                                        <li><a href="{{ route('profile.index') }}">
                                                <i class="icon-material-outline-account-circle"></i>
                                                Account Profile</a></li>
                                        <li><a href="{{ route('settings.index') }}"><i
                                                    class="icon-material-outline-settings"></i>
                                                Settings</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <i class="icon-material-outline-power-settings-new"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
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
            @endrole
            @role('employer')
            <div id="header">
                <div class="container">
                    <div class="left-side">
                        <div id="logo">
                            <a href="{{ route('employer.dashboard') }}"><img src="{{ asset('images/logo.png')}}" alt=""></a>
                        </div>
                        <nav id="navigation">
                            <ul id="responsive">
                                <li>
                                    <a href="{{ route('employer.dashboard') }}" style="margin-top: 2px;">Dashboard</a>
                                </li>
                                <li><a href="#">Manage Jobs</a>
                                    <ul class="dropdown-nav">
                                        <li><a href="{{ route('jobs.create') }}">Add New Job</a></li>
                                        <li><a href="{{ route('jobs.index') }}">Manage Jobs</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#small-dialog" data-backdrop="static" data-keyboard="false"
                                       class="popup-with-zoom-anim"><span>Feedback</span></a>
                                </li>
                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                    </div>
                    <div class="right-side">
                        <div class="header-widget hide-on-mobile">
                            <div class="header-notifications">
                                <div class="header-notifications-trigger">
                                    <a href="#"><i class="icon-feather-bell"></i><span id="notification-counts">0</span></a>
                                </div>
                                <div class="header-notifications-dropdown">
                                    <div class="header-notifications-headline">
                                        <h4>Notifications</h4>
                                        {{--                                        <button class="mark-as-read ripple-effect-dark" title="Mark all as read"--}}
                                        {{--                                                data-tippy-placement="left">--}}
                                        {{--                                            <i class="icon-feather-check-square"></i>--}}
                                        {{--                                        </button>--}}
                                    </div>
                                    <div class="header-notifications-content">
                                        <div class="header-notifications-scroll" data-simplebar>
                                            @include('components.notification')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-notifications">
                                <div class="header-notifications-trigger">
                                    <a href="#"><i class="icon-feather-mail"></i><span>0</span></a>
                                </div>
                                <div class="header-notifications-dropdown">
                                    <div class="header-notifications-headline">
                                        <h4>Messages</h4>
                                    </div>
                                    <div class="header-notifications-content">
                                        <div class="header-notifications-scroll" data-simplebar>
                                            <ul>
                                                <li class="notifications-not-read">
                                                    <a href="javascript:void(0)">
                                                        <div class="notification-text">
                                                            <strong>Empty</strong>
                                                            <p class="notification-msg-text">
                                                                No Messages Yet</p>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)"
                                       class="header-notifications-button dark ripple-effect button-sliding-icon">
                                        No Old Messages
                                        <i class="icon-material-outline-arrow-right-alt"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="header-widget">
                            <div class="header-notifications user-menu">
                                <div class="header-notifications-trigger">
                                    <a href="javascript:void(0)" title="Edit Profile">
                                        <div class="user-avatar status-online">
                                            @if(auth()->user()->employerProfile->getFirstMediaUrl('logos', 'thumb'))
                                                <img
                                                    src="{{ auth()->user()->employerProfile->getFirstMediaUrl('logos', 'thumb')  }}"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('images/avatar.gif')}}"
                                                     alt="{{ auth()->user()->employerProfile->name ?? 'Unknown' }}">
                                            @endif
                                        </div>
                                    </a>
                                </div>
                                <div class="header-notifications-dropdown">
                                    <div class="user-status">
                                        <div class="user-details">
                                            <div class="user-avatar status-online">
                                                @if(auth()->user()->employerProfile->getFirstMediaUrl('logos', 'thumb'))
                                                    <img
                                                        src="{{ auth()->user()->employerProfile->getFirstMediaUrl('logos', 'thumb')  }}"
                                                        alt="{{ auth()->user()->employerProfile->name ?? 'Update Profile' }}">
                                                @else
                                                    <img src="{{ asset('images/avatar.gif')}}"
                                                         alt="{{ auth()->user()->employerProfile->name ?? 'Unknown' }}">
                                                @endif
                                            </div>
                                            <div class="user-name">
                                                {{ auth()->user()->employerProfile->name ?? 'Update Profile' }}
                                                <span>
                                                    {{ auth()->user()->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="status-switch" id="snackbar-user-status">
                                            <label
                                                class="user-online {{ auth()->user()->employerProfile->jobs_open == 'yes' ? 'current-status' : '' }}">HiringON</label>
                                            <label
                                                class="user-invisible {{ auth()->user()->employerProfile->jobs_open == 'no' ? 'current-status' : '' }}">HiringOFF</label>
                                            <span
                                                class="status-indicator {{ auth()->user()->employerProfile->jobs_open == 'no' ? 'right' : '' }}"
                                                aria-hidden="true">
                                                </span>
                                        </div>
                                    </div>
                                    <ul class="user-menu-small-nav">
                                        <li>
                                            <a href="{{ route('employer-profile.index') }}">
                                                <i class="icon-material-outline-account-circle"></i>
                                                Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('settings.index') }}">
                                                <i class="icon-material-outline-settings"></i>
                                                Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <i class="icon-material-outline-power-settings-new"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
            @endrole
        @endauth
    </header>
    @yield('content')
    <div id="footer">
        <div class="footer-top-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-rows-container">
                            <div class="footer-rows-left">
                                <div class="footer-row">
                                    <div class="footer-row-inner footer-logo">
                                        <img src="{{asset('images/logo2.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="footer-rows-right">
                                <div class="footer-row">
                                    <div class="footer-row-inner">
                                        <ul class="footer-social-links">
                                            <li>
                                                <a href="https://www.facebook.com/JobCito-103516151179840"
                                                   target="_blank"
                                                   title="facebook"
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
                                                <a href="https://www.linkedin.com/company/jobcito" title="LinkedIn"
                                                   data-tippy-placement="bottom"
                                                   data-tippy-theme="light">
                                                    <i class="icon-brand-linkedin-in"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>For Candidates</h3>
                            <ul>
                                <li><a href="{{ route('search', 'all=true') }}"><span>Browse Jobs</span></a></li>
                                <li><a href="{{ route('search', 'all=latest') }}"><span>Job Alerts</span></a></li>
                                <li><a href="{{ route('login') }}"><span>My Applied Jobs</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>For Employers</h3>
                            <ul>
                                <li><a href="{{ route('login') }}"><span>Browse Candidates</span></a></li>
                                <li><a href="{{ route('jobs.create') }}"><span>Post a Job</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="footer-links">
                            <h3>Helpful Links</h3>
                            <ul>
                                <li><a href="{{ route('contact.index') }}"><span>Contact</span></a></li>
                                <li>
                                    <a href="#small-dialog" class="popup-with-zoom-anim margin-bottom-50">Feedback </a>
                                </li>
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
                        @include('components.news-letter')
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
<script src="{{ asset('js/simplebar.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-slider.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('js/snackbar.js')}}"></script>
<script src="{{ asset('js/clipboard.min.js')}}"></script>
<script src="{{ asset('js/counterup.min.js')}}"></script>
<script src="{{ asset('js/magnific-popup.min.js')}}"></script>
<script src="{{ asset('js/slick.min.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
@yield('js-hooks')
@stack('component-js')
<script>
    let searchParams = new URLSearchParams(window.location.search);
    if (searchParams.has('notification')) {
        let param = searchParams.get('notification');
        readurl = "{{ route('notificationStatus', 'id') }}".replace('id', "{{ request('notification') }}");
        $.ajax({
            url: readurl,
            success: function (data) {
                console.log('Marked as read');
            }
        });
    }
</script>
@role('emmployer')
<script>
    $('#snackbar-user-status label').click(function () {
        var openStatus = '';
        if ($(this).text().replace(' ', '') == 'HiringON') {
            openStatus = 'yes';
        } else {
            openStatus = 'no';
        }
        $.ajax({
            url: '{{ route('change-status') }}',
            method: 'POST',
            dataType: 'JSON',
            data: {
                _token: '{{ csrf_token() }}',
                status: openStatus
            },
            success: (data) => {
                Snackbar.show({
                    text: 'Your job status has been updated!',
                    pos: 'bottom-center',
                    showAction: false,
                    actionText: "Dismiss",
                    duration: 3000,
                    textColor: '#fff',
                    backgroundColor: '#383838'
                });
            }
        });
    });
</script>
@endrole
@role('employee')
<script>
    $('#snackbar-user-status label').click(function () {
        var openStatus = '';
        if ($(this).text().replace(' ', '') == 'JobSearchON') {
            openStatus = 'yes';
        } else {
            openStatus = 'no';
        }
        $.ajax({
            url: '{{ route('jobSearch') }}',
            method: 'POST',
            dataType: 'JSON',
            data: {
                _token: '{{ csrf_token() }}',
                status: openStatus
            },
            success: (data) => {
                Snackbar.show({
                    text: 'Your job status has been updated!',
                    pos: 'bottom-center',
                    showAction: false,
                    actionText: "Dismiss",
                    duration: 3000,
                    textColor: '#fff',
                    backgroundColor: '#383838'
                });
            },
            error: (xhr) => {
                console.log(xhr);
            }
        });
    });
</script>
@endrole
<script>
    @if(session('success'))
    Snackbar.show({
        text: "{{ session('success') }}",
        pos: 'bottom-center',
        showAction: true,
        actionText: '&times',
        duration: 3000,
        textColor: '#fff',
        backgroundColor: '#38b653'
    });
    @endif
    @if($errors->any())
    Snackbar.show({
        text: "{{ __('We found some input issues please check and try again!') }}",
        pos: 'bottom-center',
        showAction: true,
        actionText: '&times',
        duration: 4000,
        textColor: '#fff',
        backgroundColor: '#ff2d20'
    });
    @endif
    $(window).on('load', function () {
        $('#status').fadeOut();
        $('#preloader').fadeOut('slow');
        $('body').delay(350).css({'overflow': 'visible'});
    })
</script>
</body>
</html>
