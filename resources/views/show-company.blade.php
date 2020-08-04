@extends('layouts.app')
@section('title',  $company->name." INR ". number_format($company->average_salary)."/- CTC ".substr($company->services, 0, 60))
@section('description')
    {{ $company->amenities }}
@endsection
@section('keywords')
    Jobs At {{ $company->zipcode }}, {{ $company->total_employees }} Employees Company, company name {{ $company->name }}, Jobs at {{ $company->city->name }}
@endsection
@section('og-page-name',  $company->name." INR ". number_format($company->average_salary)."/- CTC ".$company->services)
@section('og-job-description')
    {{ $company->amenities }}
@endsection
@section('og-job-url', request()->fullUrl())
@section('twitter-card', 'summary_large_image')
@section('content')
    @auth
        @include('components.employer-review', ['CompanyName' => $company->name,'profileId' => $company->id])
    @endauth
    @guest
        @include('components.authenticate')
    @endguest
    <div class="single-page-header" data-background-image="{{ asset('images/single-company.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-header-inner">
                        <div class="left-side">
                            <div class="header-image">
                                @if($company->getFirstMediaUrl('logos','square'))
                                    <img src="{{ $company->getFirstMediaUrl('logos','square') }}"
                                         alt="{{ $company->title ?? 'Unknown' }}">
                                @else
                                    <img src="{{ asset('images/company-logo-05.png')}}"
                                         alt="{{ $company->title ?? 'Unknown' }}">
                                @endif
                            </div>
                            <div class="header-details">
                                <h3>
                                    {{ $company->name ?? 'Unknown' }}
                                    <span>Total Employees: {{ $company->total_employees ?? 0 }}</span>
                                </h3>
                                <li>
                                    <ul>
                                        @if($company->averageRating())
                                            <div class="star-rating"
                                                 data-rating="{{ $company->averageRating() }}"></div>
                                        @else
                                            <div>
                                                <span class="icon-material-outline-star-border"></span>
                                                <span>No Rating Yet</span>
                                            </div>
                                            @endif
                                            </li>
                                            <li>
                                                <img class="flag" src="{{ asset('images/flags/in.webp') }}"
                                                     alt="{{ $company->city->state ?? 'State Not Added' }}">
                                                {{ $company->city->city_name ?? 'City Not Added'  }}
                                                ({{ $company->city->state ?? 'State Not Added' }})
                                            </li>
                                            <li>
                                                <div class="verified-badge-with-title">Verified</div>
                                            </li>
                                    </ul>
                            </div>
                        </div>
                        <div class="right-side">
                            <div class="salary-box">
                                <div class="salary-type">Annual Average Salary(CTC)</div>
                                <div class="salary-amount">INR {{ number_format($company->average_salary) }}/-</div>
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

                    <h3 class="margin-bottom-25">About Company</h3>
                    <div class="margin-bottom-10">
                        <h4 class="margin-bottom-10">
                            <mark class="color">Amenities</mark>
                        </h4>
                        {!!   nl2br($company->amenities) !!}
                    </div>
                    <div class="margin-bottom-10">
                        <h4 class="margin-bottom-10">
                            <mark class="color">Services</mark>
                        </h4>
                        {!!   nl2br($company->services) !!}
                    </div>
                    <div class="margin-bottom-10">
                        <h4 class="margin-bottom-10">
                            <mark class="color">Overview</mark>
                        </h4>
                        {!!   nl2br($company->overview) !!}
                    </div>

                </div>

                <!-- Boxed List -->
                <div class="boxed-list margin-bottom-60">
                    <div class="boxed-list-headline">
                        <h3><i class="icon-material-outline-business-center"></i> Open Positions</h3>
                    </div>
                    <div class="listings-container compact-list-layout">
                        @forelse($openPositions as $job)
                            <a href="{{  route('showJob', [$job->id, str_slug($job->title)]) }}" class="job-listing">
                                <div class="job-listing-details">
                                    <div class="job-listing-company-logo">
                                        @if($job->getFirstMediaUrl('job_post_images','thumb'))
                                            <img src="{{ $job->getFirstMediaUrl('job_post_images','square') }}"
                                                 height="50"
                                                 alt="{{ $job->title }}">
                                        @else
                                            <img src="{{ asset('images/company-logo-01.png')}}" alt="{{ $job->title }}">
                                        @endif
                                    </div>
                                    <div class="job-listing-description">
                                        <h3 class="job-listing-title">
                                            {{ ucwords(strtolower($job->title)) }}
                                        </h3>
                                        <div class="job-listing-footer">
                                            <ul>
                                                <li><i class="icon-material-outline-business"></i>
                                                    {{ $job->employer->employerProfile->name }}
                                                    <div class="verified-badge" title="Verified Employer"
                                                         data-tippy-placement="top">
                                                    </div>
                                                </li>
                                                <li>
                                                    <i class="icon-material-outline-location-on"></i>
                                                    <b>{{ $job->location->city_name ?? 'City Not Added' }}</b>
                                                    ({{ $job->location->state ?? 'State Not Added' }})
                                                </li>
                                                <li>
                                                    <i class="icon-material-outline-business-center"></i>
                                                    {{ $job->type }}
                                                </li>
                                                <li><i class="icon-material-outline-access-time"></i>
                                                    {{ $job->created_at->diffForHumans() }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @empty

                            @endforelse
                            @include('components.paginator', ['paginator' => $openPositions])
                    </div>
                </div>
                <div class="boxed-list margin-bottom-60">
                    <div class="boxed-list-headline">
                        <h3><i class="icon-material-outline-thumb-up"></i> Total Reviews({{ $reviews->count() }}) </h3>
                    </div>
                    <ul class="boxed-list-ul">
                        @forelse($approvedReviews as $review)
                            <li>
                                <div class="boxed-list-item">
                                    <div class="item-content">
                                        <h4>{{ $review->employee_title }}
                                            <span>
                                                {{ $review->employeeProfile->name ?? 'Anonymous Employee' }}
                                            </span>
                                        </h4>
                                        <div class="item-details margin-top-10">
                                            <div class="star-rating"
                                                 data-rating="{{ $review->employee_rating }}"></div>
                                            <div class="detail-item"><i class="icon-material-outline-date-range"></i>
                                                {{ $review->created_at->format('F') }}
                                                {{ $review->created_at->year }}
                                                <div class="verified-badge-with-title">Verified Review</div>
                                            </div>
                                        </div>
                                        <div class="item-description">
                                            <p>
                                                {{ $review->employee_message }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                        @endforelse

                    </ul>
                    @if($reviewAdded)
                        <div class="centered-button margin-top-35">
                            <a href="javascript:void(0)" class=" dark button">
                                Review Already Added
                                <i class="icon-line-awesome-times-circle-o"></i>
                            </a>
                        </div>
                    @else
                        <div class="centered-button margin-top-35">
                            <a href="#small-dialog" class="popup-with-zoom-anim button button-sliding-icon">
                                Leave a Review
                                <i class="icon-material-outline-arrow-right-alt"></i></a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="sidebar-container">
                    <div class="sidebar-widget">
                        <h3>Location</h3>
                        {{ $company->address1 ?? 'Address Not Added' }},
                        {{ $company->city->city_name ?? 'City Not Added' }}
                        ({{ $company->city->state ?? 'State Not Added' }})
                        {{ $company->zipcode }}
                    </div>
                    {{--                    <div class="sidebar-widget">--}}
                    {{--                        <h3>Social Profiles</h3>--}}
                    {{--                        <div class="freelancer-socials margin-top-25">--}}
                    {{--                            <ul>--}}
                    {{--                                <li><a href="#" title="Dribbble" data-tippy-placement="top"><i--}}
                    {{--                                            class="icon-brand-dribbble"></i></a></li>--}}
                    {{--                                <li><a href="#" title="Twitter" data-tippy-placement="top"><i--}}
                    {{--                                            class="icon-brand-twitter"></i></a></li>--}}
                    {{--                                <li><a href="#" title="Behance" data-tippy-placement="top"><i--}}
                    {{--                                            class="icon-brand-behance"></i></a></li>--}}
                    {{--                                <li><a href="#" title="GitHub" data-tippy-placement="top"><i--}}
                    {{--                                            class="icon-brand-github"></i></a></li>--}}

                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="sidebar-widget">
                        <div class="share-buttons margin-top-25">
                            <div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
                            <div class="share-buttons-content">
                                <span>Interesting? <strong>Share It!</strong></span>
                                <ul class="share-buttons-icons">
                                    <li>
                                        <a href="https://www.facebook.com/sharer.php?u={{ request()->fullUrl() }}"
                                           data-button-color="#3b5998" title="Share on Facebook"
                                           data-tippy-placement="top"><i class="icon-brand-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/intent/tweet?url={{ request()->fullUrl() }}&text={{ $company->name ?? 'Unknown' }}"
                                           data-button-color="#1da1f2"
                                           title="Share on Twitter"
                                           data-tippy-placement="top">
                                            <i class="icon-brand-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ request()->fullUrl() }}&title={{$company->name}}&summary={{ substr($company->overview,0,120) }}"
                                           data-button-color="#0077b5" title="Share on LinkedIn"
                                           data-tippy-placement="top">
                                            <i class="icon-brand-linkedin-in"></i>
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
    <div class="margin-top-15"></div>
@endsection
