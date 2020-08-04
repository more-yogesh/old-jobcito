@extends('layouts.app')
@section('title', 'Jobs('.$jobs->total().')')
@section('css-hooks')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
    <style>
        #profile input, input[type=text], input[type=password], input[type=email], input[type=number], textarea, select {
            margin: 0 0 0px;
        }

        #profile .invalid-input {
            color: red !important;
        }

        .bootstrap-tagsinput {
            display: block;
            padding: 0px;
        }

        .bootstrap-tagsinput .tag {
            color: #2a41e8;
            background: #ecedfa;
            display: inline-block;
        }

        .label-info {
            border-radius: 4px;
            cursor: default;
            margin: 5px 7px 7px 5px;
            height: 35px;
            line-height: 35px;
            box-sizing: border-box;
            padding-right: 5px;
            padding-left: 5px;
        }

        form {
            display: inline-block;
        }
    </style>
@endsection
@section('content')
    <div class="section gray">
        <div class="dashboard-content-inner">
            <div class="dashboard-headline">
                @if(request('trash') == 'true')
                    <h3>Manage Trashed Jobs({{ $jobs->total() }})</h3>
                @else
                    <h3>Manage Jobs({{ $jobs->total() }})</h3>
                @endif
                <span>Add, Edit, Or Send Them to the <mark>Trash</mark> for reuse in future.
            @if(request('trash') == 'true')
                        <a href="{{ route('jobs.index') }}">Active Jobs</a>
                    @else
                        <a href="{{ route('jobs.index') }}?trash=true">Check Trash</a>
                    @endif
        </span>
            </div>
            <div class="dashboard-box margin-top-0">
                <div class="headline">
                    <h3><i class="icon-material-outline-business-center"></i> My Job Listings</h3>
                </div>
                <div class="content">
                    <ul class="dashboard-box-list">
                        @forelse ($jobs as $job)
                            <li>
                                <!-- Job Listing -->
                                <div class="job-listing">
                                    <!-- Job Listing Details -->
                                    <div class="job-listing-details">
                                        <a href="#" class="job-listing-company-logo">
                                            @if($job->getFirstMediaUrl('job_post_images', 'thumb') == '')
                                                <img src="{{ asset('images/company-logo-05.png') }}">
                                            @else
                                                <img src="{{ $job->getFirstMediaUrl('job_post_images', 'thumb') }}"
                                                     height="50"/>
                                            @endif
                                        </a>
                                        <div class="job-listing-description">
                                            <h3 class="job-listing-title">
                                                <a href="#">{{ $job->title }}</a>
                                                {{--                                        <span class="dashboard-status-button green">Pending Approval</span>--}}
                                            </h3>
                                            <!-- Job Listing Footer -->
                                            <div class="job-listing-footer">
                                                <ul>
                                                    <li>
                                                        <i class="icon-material-outline-date-range"></i>
                                                        Posted {{ $job->created_at->diffForHumans() }}
                                                    </li>
                                                    <li>
                                                        <i class="icon-feather-tag" title="tags"
                                                           data-tippy-placement="top"></i>
                                                        @forelse($job->tags as $tags)
                                                            <div class="keywords-list" style="height: auto;">
                                                        <span class="keyword">
                                                            <span
                                                                class="keyword-text padding-left-10">{{ $tags->name }}</span>
                                                        </span>
                                                            </div>
                                                        @empty
                                                            <span>No Tags Added</span>
                                                        @endforelse
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="buttons-to-right always-visible">
                                    <a href="{{ route('candidates', $job->id) }}" class="button ripple-effect">
                                        <i class="icon-material-outline-supervisor-account"></i> Manage Candidates
                                        <span class="button-info">{{ $job->appliedJobs->count() }}</span>
                                    </a>
                                    <form action="{{ route('jobs.destroy', $job->id) }}"
                                          method="post"
                                          onsubmit="return confirmDelete()">
                                        @method('DELETE')
                                        @csrf
                                        @if($job->trashed())
                                            <a href="{{ route('jobs.show', $job->id) }}"
                                               class="button dark ripple-effect">
                                                <i class="icon-feather-rotate-ccw"></i>
                                                Restore
                                            </a>
                                        @else
                                            <a href="{{ route('jobs.edit', $job->id) }}"
                                               class="button gray ripple-effect ico"
                                               title="Edit" data-tippy-placement="top"><i class="icon-feather-edit"></i></a>
                                            <button class="button gray ripple-effect ico" title="Trash"
                                                    data-tippy-placement="top" style="margin-top: -25px">
                                                <i class="icon-feather-trash-2"></i>
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </li>
                        @empty
                            <div class="welcome-text">
                                @if(request('trash') == 'true')
                                    <h2 class="padding-left-30 padding-right-30 padding-top-30 padding-bottom-30">
                                        You'r Trash is empty and all jobs are active
                                    </h2>
                                    <p>
                                        <a href="{{ route('jobs.create') }}"
                                           class="button ripple-effect button-sliding-icon">
                                            Add a job post <i class="icon-feather-plus-circle"></i>
                                        </a>
                                    </p>
                                    <img src="{{ asset('images/trash.gif') }}" height="500">
                                @else
                                    <h2 class="padding-left-30 padding-right-30 padding-top-30 padding-bottom-30">
                                        You don't have any active job!
                                    </h2>
                                    <p>
                                        <a href="{{ route('jobs.create') }}"
                                           class="button ripple-effect button-sliding-icon">
                                            Add new job post !
                                            <i class="icon-feather-plus-circle"></i>
                                        </a>
                                    </p>
                                    <img src="{{ asset('images/empty.gif') }}" height="500">
                                @endif
                            </div>
                        @endforelse
                    </ul>
                    <style>
                        .avoid-clicks {
                            pointer-events: none;
                        }
                    </style>
                </div>
            </div>
            @include('components.paginator', ['paginator' => $jobs])
            <div class="dashboard-footer-spacer"></div>
        </div>
    </div>
@endsection
@section('js-hooks')
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tags').tagsinput({
                maxTags: 6,
                maxChars: 120,
                trimValue: true
            });
        });

        function confirmDelete() {
            if (confirm('Are you sure want to move in Trash?')) {
                return true
            }
            return false;
        }
    </script>
@endsection
