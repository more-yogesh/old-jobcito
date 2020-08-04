@extends('layouts.app')
@section('title', 'Search Jobs')
@section('description')
    Search jobs based on your location, Zipcode, Salary Range, Experience, and interested tags and apply
@endsection
@section('keywords')
    job search, job networking, new vacancy, freshers job, best experienced jobs.
@endsection
@section('og-page-name', 'job search here')
@section('og-job-image', asset('images/logo.png'))
@section('og-job-description')
    Start searching your specialization, Best facilities company, best salary companies based on your profile
@endsection
@section('og-job-url', request()->fullUrl())
@section('twitter-card', 'summary_large_image')
@section('content')
    <div class="full-page-container">
        <div class="full-page-sidebar enabled-sidebar">
            <div class="full-page-sidebar-inner" data-simplebar>
                <form method="get" action="{{ route('search') }}">
                    <div class="sidebar-container">
                        <div class="sidebar-widget">
                            <h3>Job Title</h3>
                            <input id="autocomplete-input" type="text" name="title"
                                   placeholder="e.g. PHP developer, ASP Developer"
                                   value="{{ request('title') ?? null }}">
                        </div>
                        <div class="sidebar-widget">
                            <h3>Category</h3>
                            <select data-selected-text-format="count" name="category" data-size="7"
                                    title="All Categories">
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sidebar-widget">

                            @include('components.city-selector',
                                            ['cityId' => request('city_id'),
                                             'state' => $city->state ?? '',
                                             'city' => $city->city_name ?? '',
                                            ])
                        </div>

                        <div class="sidebar-widget">
                            <h3>Job Type</h3>
                            <div class="switches-list">
                                @foreach($jobType as $type)
                                    <div class="switch-container">
                                        <label class="switch">
                                            <input type="checkbox"
                                                   name="type[]"
                                                   {{ in_array($type->id, request('type') ?? ['0']) ? 'checked' : '' }}
                                                   value="{{ $type->id }}">
                                            <span class="switch-button"></span>
                                            {{ $type->type }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h3>Salary</h3>
                            <div class="margin-top-55"></div>
                            <input class="range-slider"
                                   type="text"
                                   value=""
                                   name="salary_range"
                                   data-slider-currency="INR "
                                   data-slider-min="80000"
                                   data-slider-max="2000000" data-slider-step="10000"
                                   data-slider-value="[{{ request('salary_range') ?? '80000,2000000' }}]"/>
                        </div>
                        {{--                        <div class="sidebar-widget">--}}
                        {{--                            <h3>Tags</h3>--}}

                        {{--                            <div class="tags-container">--}}
                        {{--                                {{ dd(request('tags')) }}--}}
                        {{--                                @foreach($tags as $tag)--}}
                        {{--                                    <div class="tag">--}}
                        {{--                                        <input type="checkbox"--}}
                        {{--                                               name="tags[]"--}}
                        {{--                                               id="{{$tag->slug}}"--}}
                        {{--                                               value="{{ $tag->id }}"--}}
                        {{--                                               id="{{$tag->slug}}"/>--}}
                        {{--                                        <label for="{{ $tag->slug }}">{{ $tag->name }}</label>--}}
                        {{--                                    </div>--}}
                        {{--                                @endforeach--}}
                        {{--                            </div>--}}
                        {{--                            <div class="clearfix"></div>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="sidebar-search-button-container">
                        <button class="button ripple-effect">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="full-page-content-container" data-simplebar>
            <div class="full-page-content-inner">

                <h3 class="page-title">Search Results({{ number_format($jobs->total()) }})</h3>

                <div class="notify-box margin-top-15">
                    <div class="switch-container">
                        <span class="switch">
                            Showing Results for "<b>{{ request('title') }}, {{ request('location') }}</b>"
                        </span>
                    </div>
                </div>
                <div class="listings-container margin-top-35">
                    @forelse($jobs as $job)
                        <a href="{{  route('showJob', [$job->id, str_slug($job->title)]) }}" class="job-listing">

                            <!-- Job Listing Details -->
                            <div class="job-listing-details">
                                <!-- Logo -->
                                <div class="job-listing-company-logo">
                                    @if($job->employer->employerProfile->getFirstMediaUrl('logos','square'))
                                        <img
                                            src="{{ $job->employer->employerProfile->getFirstMediaUrl('logos','square') }}"
                                            alt="{{ $job->title }}">
                                    @else
                                        <img src="{{ asset('images/company-logo-05.png')}}"
                                             alt="{{ $job->title }}">
                                    @endif
                                </div>

                                <!-- Details -->
                                <div class="job-listing-description">
                                    <h4 class="job-listing-company">
                                        {{ $job->employer->employerProfile->name }}
                                        <span class="verified-badge" data-tippy-placement="top" data-tippy=""
                                              data-original-title="Verified Employer"></span>
                                    </h4>
                                    <h3 class="job-listing-title">{{ ucwords(strtolower($job->title)) }}</h3>
                                    <p class="job-listing-text">
                                        {{ substr(ucfirst(strtolower($job->description)),0, 130) }}...
                                    </p>
                                </div>

                                <!-- Bookmark -->
                                <span class="bookmark-icon"></span>
                            </div>

                            <!-- Job Listing Footer -->
                            <div class="job-listing-footer">
                                <ul>
                                    <li><i class="icon-material-outline-location-on"></i>
                                        <b>{{ $job->location->city_name ?? '' }}</b>
                                        ({{ $job->location->state ?? '' }})
                                    </li>
                                    <li><i class="icon-material-outline-business-center"></i> {{ $job->jobType->type }}
                                    </li>
                                    <li><i class="icon-material-outline-account-balance-wallet"></i>
                                        INR {{ number_format($job->salary_upto) }}/-
                                    </li>
                                    <li>
                                        <i class="icon-material-outline-access-time"></i> {{ $job->created_at->diffForHumans() }}
                                    </li>
                                </ul>
                            </div>
                        </a>
                    @empty
                        <div class="job-listing" style="width: 100%">
                            <div class="job-listing-details">
                                <img src="{{ asset('images/not-found-jobs.gif') }}"
                                     width="40%"
                                     style="position: relative;margin: 0 auto;">
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="clearfix"></div>

                @include('components.paginator', ['paginator' => $jobs])

                <div class="clearfix"></div>
                <!-- Pagination / End -->
            </div>
        </div>
    </div>
@endsection
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
