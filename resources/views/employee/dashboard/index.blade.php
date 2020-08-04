@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    @if(auth()->user()->employee->percentage() >= 80)
        <div class="section gray">
            <div class="dashboard-content-inner">
                <div class="dashboard-headline">
                    <h3 style="text-transform: lowercase;text-transform: capitalize;">
                        {{
                             auth()->user()->employee->name ?
                             'Welcome, '.strtolower(ucfirst(auth()->user()->employee->name)) :
                             'Welcome, To The '.env('APP_NAME')
                        }}!
                    </h3>
                    <span>We are glad to see you again!</span>
                    @if (session('status'))
                        <div class="notification success closeable margin-top-10">
                            <p>{{ session('status') }}</p>
                            <a class="close"></a>
                        </div>
                    @endif
                </div>
                <div class="fun-facts-container">
                    <div class="fun-fact" data-fun-fact-color="#36bd78">
                        <div class="fun-fact-text">
                            <span>Profile Views</span>
                            <h4>22</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
                    </div>
                    <div class="fun-fact" data-fun-fact-color="#b81b7f">
                        <div class="fun-fact-text">
                            <span>Jobs Applied</span>
                            <h4>{{ $appliedJobs }}</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
                    </div>
                    <div class="fun-fact" data-fun-fact-color="#efa80f">
                        <div class="fun-fact-text">
                            <span>Reviews</span>
                            <h4>{{ $reviewsCount }}</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
                    </div>

                    <!-- Last one has to be hidden below 1600px, sorry :( -->
                    <div class="fun-fact" data-fun-fact-color="#2a41e6">
                        <div class="fun-fact-text">
                            <span>This Month Views</span>
                            <h4>987</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 margin-bottom-50">
                        <div class="dashboard-box">
                            <div class="headline">
                                <h3><i class="icon-material-baseline-notifications-none"></i> Notifications</h3>
                                <button class="mark-as-read ripple-effect-dark" data-tippy-placement="left"
                                        title="Mark all as read">
                                    <i class="icon-feather-check-square"></i>
                                </button>
                            </div>
                            <div class="content">
                                <ul class="dashboard-box-list">
                                    <li>
                                        <span class="notification-icon"><i
                                                class="icon-material-outline-group"></i></span>
                                        <span class="notification-text">
										<strong>Michael Shannah</strong> applied for a job <a href="#">Full Stack Software Engineer</a>
									</span>
                                        <!-- Buttons -->
                                        <div class="buttons-to-right">
                                            <a href="#" class="button ripple-effect ico" title="Mark as read"
                                               data-tippy-placement="left"><i class="icon-feather-check-square"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 margin-bottom-50">
                        <div class="dashboard-box">
                            <div class="headline">
                                <h3><i class="icon-material-outline-assignment"></i> Added Reviews</h3>
                            </div>
                            <div class="content">
                                <ul class="dashboard-box-list">
                                    @forelse($reviews as $review)
                                        <li>
                                            <div class="invoice-list-item">
                                                <strong>{{ $review->employerProfile->name ?? 'Company Name not Provided' }}</strong>
                                                <ul>
                                                    <li><span
                                                            class="paid icon-line-awesome-star"> {{ $review->employee_rating }}</span>
                                                    </li>
                                                    <li>{{ substr($review->employee_title,0,60) }}...</li>
                                                    <li>{{ $review->created_at->format('d/m/Y') }}</li>
                                                </ul>
                                            </div>
                                            {{--                                    <div class="buttons-to-right">--}}
                                            {{--                                        <a href="#" class="button">Edit Ratings</a>--}}
                                            {{--                                    </div>--}}
                                        </li>
                                    @empty

                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="section gray">
            <div class="dashboard-content-inner">
                <div class="dashboard-headline margin-bottom-0">
                    <h3>Superb!<br/> You're now verified employee</h3>
                    <span>All You Need to complete your profile and ready to go.</span>
                    <a href="{{ route('profile.index') }}" class="button ripple-effect button-sliding-icon margin-top-5">
                        Go To My Profile<i class="icon-feather-arrow-right-circle"></i>
                    </a>
                    @php $percentage = auth()->user()->employee->percentage(); @endphp
                    @if($percentage < 100)
                        @include('components.progressbar', ['percentage' => $percentage])
                    @endif
                    <div class="welcome-text margin-bottom-0">
                        <img src="{{ asset('images/edit-profile.gif') }}" width="40%">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
