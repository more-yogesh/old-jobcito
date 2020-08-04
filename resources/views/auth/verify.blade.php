@extends('layouts.app')
@section('title', 'Verify Your Email')
@section('content')
    <div class="section gray">
        <div class="dashboard-content-inner">
            <div class="section margin-top-20 margin-bottom-20">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="col-xl-5 offset-xl-3">
                                <div class="pricing-plan recommended">
                                    <div class="recommended-badge">Verify Email</div>
                                    <div class="welcome-text">
                                        <img src="{{ asset('images/done.gif') }}" height="80"/>
                                    </div>
                                    <strong class="margin-top-10 welcome-text">
                                        Wow! You are almost done,
                                        <br/>Please check your email for a verification link. If you did not receive
                                        the
                                        email,
                                    </strong>
                                    @if (session('resent'))
                                        <div class="notification success closeable margin-top-10">
                                            <p>{{ __('Email Sent Please Check Your Email') }}</p>
                                            <a class="close"></a>
                                        </div>
                                    @endif
                                    <div class="pricing-plan-features welcome-text margin-top-30">
                                        <hr/>
                                        <p>Click bellow for another email request</p>
                                        <form method="POST" action="{{ route('verification.resend') }}">
                                            @csrf
                                            <button class="button dark dark-theme margin-top-20" type="submit">
                                                {{ __('click here to request another') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
