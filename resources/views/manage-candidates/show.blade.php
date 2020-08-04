@extends('layouts.app')
@section('title', 'Manage Candidates')
@section('content')
    <div class="section gray">
        <div class="dashboard-content-inner">
            <div class="dashboard-headline">
                <h3>Manage Candidates</h3>
                <span class="margin-top-7">Job Applications for
            <a href="{{ route('showJob', [$job->id, str_slug($job->title)]) }}" target="__blank">
                {{ $job->title }} (Check job seeker view)
            </a>
        </span>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="dashboard-box margin-top-0">
                        <div class="headline">
                            <h3>
                                <i class="icon-material-outline-supervisor-account"></i>
                                {{ $job->appliedJobs->count() }} Candidates
                            </h3>
                        </div>
                        <div class="content">
                            <ul class="dashboard-box-list">
                                @foreach($job->appliedJobs as $candidate)
                                    <li>
                                        <div class="freelancer-overview manage-candidates">
                                            <div class="freelancer-overview-inner">
                                                <div class="freelancer-avatar">
                                                    <div class="verified-badge"></div>
                                                    <a href="#">
                                                        @if($candidate->employeeAppliedJobs->employee->getFirstMediaUrl('profiles', 'thumb'))
                                                            <img
                                                                src="{{ $candidate->employeeAppliedJobs->employee->getFirstMediaUrl('profiles', 'thumb')  }}
                                                                    "
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('images/avatar.gif')}}" alt="">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="freelancer-name">
                                                    <h4>
                                                        <a href="#">
                                                            {{ $candidate->employeeAppliedJobs->employee->name ?? 'Unknown' }}
                                                            <img class="flag"
                                                                 src="{{ asset('images/flags/in.webp')}}" alt="india"
                                                                 title="India"
                                                                 data-tippy-placement="top">
                                                        </a>
                                                    </h4>
                                                    <span class="freelancer-detail-item">
                                            <a href="#">
                                                <i class="icon-feather-mail"></i>
                                                <span class="__cf_email__">
                                                    {{ $candidate->employeeAppliedJobs->email }}
                                                </span>
                                            </a>
                                        </span>
                                                    <span class="freelancer-detail-item">
                                            <i class="icon-feather-phone"></i>
                                                +91 {{ $candidate->employeeAppliedJobs->employee->contact ?? 'Not Provided' }}
                                        </span>
                                                    <div class="freelancer-rating">
                                                        {{--                                                {{  dd($candidate->employeeAppliedJobs->employee->employeeReview->sum('employer_rating')) }}--}}
                                                        @php
                                                            $rating = 0;
                                                            if ($candidate->employeeAppliedJobs->employee->employeeReview->count() > 0){
                                                                $rating = $candidate->employeeAppliedJobs->employee->employeeReview->sum('employer_rating') / $candidate->employeeAppliedJobs->employee->employeeReview->count();
                                                            }

                                                        @endphp
                                                        @if($rating > 0)
                                                            <div class="star-rating" data-rating="{{ $rating }}"></div>
                                                            <p>
                                                                [Based
                                                                on {{ $candidate->employeeAppliedJobs->employee->employeeReview->count() }}
                                                                reviews]
                                                            </p>
                                                        @else
                                                            <div>No Ratings Provide Yet</div>
                                                        @endif
                                                    </div>
                                                    {{--                                            <div class="buttons-to-right always-visible margin-top-25 margin-bottom-5">--}}
                                                    {{--                                                <a href="#" class="button ripple-effect"><i--}}
                                                    {{--                                                        class="icon-feather-file-text"></i> Hired</a>--}}
                                                    {{--                                                <a href="#" class="button gray ripple-effect ico"--}}
                                                    {{--                                                   title="Remove Candidate"--}}
                                                    {{--                                                   data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>--}}
                                                    {{--                                            </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
