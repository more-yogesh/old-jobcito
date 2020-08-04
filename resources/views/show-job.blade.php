@extends('layouts.app')
@section('title',  $job->title." INR ". number_format($job->salary_upto)."/- CTC ".substr($job->description, 0, 30))
@section('description')
    {{ $job->description }}
@endsection
@section('keywords')
    {{ $tags }}
@endsection
@section('og-page-name',  $job->title." INR ". number_format($job->salary_upto)."/- CTC ".substr($job->description, 0, 30))
@section('og-job-image')
    @if($job->getFirstMediaUrl('job_post_images','square'))
        {{ $job->getFirstMediaUrl('job_post_images','square') }}
    @else
        {{ asset('images/logo.png')}}" alt="{{ $job->title }}
    @endif
@endsection
@section('og-job-description')
    {{ substr($job->description,0,120) }}
@endsection
@section('og-job-url', request()->fullUrl())
@section('twitter-card', 'summary_large_image')
@section('content')
    @include('components.authenticate')
    <div class="single-page-header" data-background-image="{{ asset('images/single-job.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image">
                                <a href="{{ route('showCompany',[ $job->employer->employerProfile->id, str_slug($job->employer->employerProfile->name ?? 'unknown') ]) }}">
                                    @if($job->employer->employerProfile->getFirstMediaUrl('logos','square'))
                                        <img
                                            src="{{ $job->employer->employerProfile->getFirstMediaUrl('logos','square') }}"
                                            alt="{{ $job->title }}">
                                    @else
                                        <img src="{{ asset('images/company-logo-05.png')}}" alt="{{ $job->title }}">
                                    @endif
                                </a>
                            </div>
                            <div class="header-details">
                                <h3>{{ ucwords(strtolower($job->title)) }}</h3>
                                <h5>About the Employer:</h5>
                                <ul>
                                    <li>
                                        <a href="{{ route('showCompany',[ $job->employer->employerProfile->id, str_slug($job->employer->employerProfile->name ?? 'unknown') ]) }}">
                                            <i class="icon-material-outline-business"></i>
                                            {{ $job->employer->employerProfile->name ?? 'Unknown' }}
                                        </a>
                                    </li>
                                    <li>
                                        @if($job->employer->employerProfile->averageRating() > 0)
                                            <div class="star-rating"
                                                 data-rating="{{ $job->employer->employerProfile->averageRating() }}"></div>
                                        @endif
                                        <div class="star-rating"
                                             data-rating="No Ratings Yet"></div>
                                    </li>
                                    <li>
                                        <img class="flag" src="{{ asset('images/flags/in.webp')}}" alt="">
                                        <b>{{ $job->employer->employerProfile->city->city_name ?? 'City Not Available' }}</b>
                                        ({{ $job->employer->employerProfile->city->state ?? 'State Not Available' }})
                                    </li>
                                    <li>
                                        <div class="verified-badge-with-title">Verified</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="right-side">
                            <div class="salary-box">
                                <div class="salary-type">Annual Salary(CTC)</div>
                                <div class="salary-amount">INR {{ number_format($job->salary_upto) }}/-</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 content-right-offset">
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">Job Description</h3>
                    {!!   nl2br($job->description) !!}
                </div>
                <div class="single-page-section">
                    <h3 class="margin-bottom-25">Similar Jobs({{$similarJobs->count()}})</h3>
                    <div class="listings-container grid-layout">
                        @forelse($similarJobs as $similarJob)
                            <a href="{{ route('showJob', [$similarJob->id, str_slug($similarJob->title)]) }}"
                               class="job-listing">
                                <div class="job-listing-details">
                                    <div class="job-listing-company-logo">
                                        @if($similarJob->employer->employerProfile->getFirstMediaUrl('logos','square'))
                                            <img
                                                src="{{ $similarJob->employer->employerProfile->getFirstMediaUrl('logos','square') }}"
                                                alt="{{ $similarJob->title }}">
                                        @else
                                            <img src="{{ asset('images/company-logo-05.png')}}"
                                                 alt="{{ $similarJob->title }}">
                                        @endif
                                    </div>
                                    <div class="job-listing-description">
                                        <h4 class="job-listing-company">{{ $similarJob->employer->employerProfile->name }}</h4>
                                        <h3 class="job-listing-title">{{ $similarJob->title }}</h3>
                                    </div>
                                </div>
                                <div class="job-listing-footer">
                                    <ul>
                                        <li>
                                            <i class="icon-material-outline-location-on"></i> {{ $similarJob->employer->employerProfile->city->city_name ?? 'City Not Available' }}
                                            ({{ $similarJob->employer->employerProfile->city->state ?? 'State Not Available'}}
                                            )
                                        </li>
                                        <li>
                                            <i class="icon-material-outline-business-center">
                                            </i>{{ $similarJob->jobType->type ?? '' }}</li>
                                        <li>
                                            <i class="icon-material-outline-account-balance-wallet"></i>
                                            INR {{ number_format($similarJob->salary_upto) }}
                                        </li>
                                        <li>
                                            <i class="icon-material-outline-access-time"></i> {{ $similarJob->created_at->diffForHumans() }}
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        @empty
                            <h3>No similar Jobs Found</h3>
                            <div class="welcome-text">
                                <img src="{{ asset('images/not-found-jobs.gif') }}" height="300">
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="sidebar-container">
                    @guest
                        <a href="#small-dialog-1" class="apply-now-button popup-with-zoom-anim">
                            Apply Now
                            <i class="icon-material-outline-arrow-right-alt"></i>
                        </a>
                    @endguest

                    @auth
                        @if($isApplied)
                            <a href="javascript:void(0)"
                               class="button full-width dark ripple-effect margin-top-10 margin-bottom-10">
                                Applied
                                <i class="icon-material-outline-check"></i>
                            </a>
                        @else
                            @role('employee')
                            <form method="POST" action="{{ route('appliedJob', $job->id) }}">
                                @csrf
                                <button
                                    class="button full-width ripple-effect button-sliding-icon margin-top-10 margin-bottom-10">
                                    Apply Now
                                    <i class="icon-material-outline-arrow-right-alt"></i>
                                </button>
                            </form>
                            @endrole
                            @role('employer')
                            <a href="javascript:void(0)"
                               class="button full-width dark ripple-effect margin-top-10 margin-bottom-10">
                                Employers Can't Apply
                                <i class="icon-feather-shield-off"></i>
                            </a>
                            @endrole
                        @endif
                    @endauth
                    <div class="sidebar-widget">
                        <div class="job-overview">
                            <div class="job-overview-headline">Job Summary</div>
                            <div class="job-overview-inner">
                                <ul>
                                    <li>
                                        <i class="icon-material-outline-location-on"></i>
                                        <span>Location</span>
                                        <h5>
                                            <b>{{ $job->employer->employerProfile->city->city_name ?? 'City Not Available' }}</b>
                                            ({{ $job->employer->employerProfile->city->state ?? 'State Not Available' }}
                                            )</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-business-center"></i>
                                        <span>Job Type</span>
                                        <h5>{{ $job->jobType->type ?? '' }}</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-local-atm"></i>
                                        <span>Salary CTC</span>
                                        <h5>INR {{ number_format($job->salary_upto) }}/-</h5>
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-access-time"></i>
                                        <span>Date Posted</span>
                                        <h5>{{ $job->created_at->diffForHumans()  }}</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Widget -->
                    <div class="sidebar-widget">
                        <h3>Share and Help Need Jobs</h3>
                        <div class="share-buttons margin-top-25">
                            <div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
                            <div class="share-buttons-content">
                                <span>Interesting? <strong>Share It!</strong></span>
                                <ul class="share-buttons-icons">
                                    <li>
                                        <a href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl() }}"
                                           data-button-color="#3b5998" title="Share on Facebook" target="__blank"
                                           data-tippy-placement="top"><i class="icon-brand-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $job->title }}&hashtags={{ $tags }}"
                                           target="__blank"
                                           data-button-color="#1da1f2"
                                           title="Share on Twitter"
                                           data-tippy-placement="top">
                                            <i class="icon-brand-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ request()->fullUrl() }}&title={{$job->title}}&summary={{ substr($job->description,0,120) }}"
                                           data-button-color="#0077b5" title="Share on LinkedIn"
                                           target="__blank"
                                           data-tippy-placement="top">
                                            <i class="icon-brand-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://wa.me/?text={{ $job->title." INR ". number_format($job->salary_upto)."/- CTC ".substr($job->description,0, 255) }} -- {{ request()->fullUrl() }}"
                                           data-button-color="#05cd51" title="Share on WhatsApp"
                                           target="__blank"
                                           data-tippy-placement="top">
                                            <i class="icon-brand-whatsapp"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
