@extends('layouts.app')
@section('title', 'Dashboard')
@section('og-page-name')
Home
@endsection

@section('og-job-image')
{{ asset('images/og-image.png') }}
@endsection

@section('og-job-description')
    Surat's No.1 Job Provider, Register Free for jobs in surat    
@endsection

@section('og-job-url')
    {{ env('APP_URL') }}
@endsection

@section('canonical_url')
    {{ env('APP_URL') }}
@endsection

@section('content')
    <div class="section gray">
        <div class="dashboard-content-inner">
            @if(auth()->user()->employerProfile->name != '' && auth()->user()->employerProfile->contact != '')
                <div class="dashboard-headline">
                    <h3 style="text-transform: lowercase;text-transform: capitalize;">
                        {{ auth()->user()->employerProfile->name ?
    'Welcome, '.strtolower(ucfirst(auth()->user()->employerProfile->name)) :
     'Welcome, To The '.env('APP_NAME')
     }}!</h3>
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
                            <span>Job Posted</span>
                            <h4>{{ $postedJobsCount }}</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
                    </div>
                    <div class="fun-fact" data-fun-fact-color="#b81b7f">
                        <div class="fun-fact-text">
                            <span>Jobs Trashed/Pending</span>
                            <h4>{{ $trashedPostedJobsCount }}</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
                    </div>
                    <div class="fun-fact" data-fun-fact-color="#efa80f">
                        <div class="fun-fact-text">
                            <span>Reviews</span>
                            <h4>{{ $reviewCount }}</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
                    </div>
                    <div class="fun-fact" data-fun-fact-color="#2a41e6">
                        <div class="fun-fact-text">
                            <span>This Month Views</span>
                            <h4>987</h4>
                        </div>
                        <div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="dashboard-box main-box-in-row">
                            <div class="headline">
                                <h3><i class="icon-feather-bar-chart-2"></i> Your Profile Views</h3>
                                <div class="sort-by">
                                    <select class="selectpicker hide-tick">
                                        <option>Last 6 Months</option>
                                        <option>This Year</option>
                                        <option>This Month</option>
                                    </select>
                                </div>
                            </div>
                            <div class="content">
                                <div class="chart">
                                    <canvas id="chart" width="100" height="45"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
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
                                    @foreach($notifications as $notification)
                                        <li>
                                            <a href="{{ $notification->data['notificationLink']['link'] }}">
                                            <span class="notification-icon">
                                                <i class="icon-material-outline-group"></i>
                                            </span>
                                            <span class="notification-text">
                                                {!! $notification->data['notificationLink']['text'] !!}
                                            </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Box -->
                    {{--                    <div class="col-xl-6">--}}
                    {{--                        <div class="dashboard-box">--}}
                    {{--                            <div class="headline">--}}
                    {{--                                <h3><i class="icon-material-outline-assignment"></i>Pending Reviews</h3>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="content">--}}
                    {{--                                <ul class="dashboard-box-list">--}}
                    {{--                                    <li>--}}
                    {{--                                        <div class="invoice-list-item">--}}
                    {{--                                            <strong>Professional Plan</strong>--}}
                    {{--                                            <ul>--}}
                    {{--                                                <li><span class="unpaid">Unpaid</span></li>--}}
                    {{--                                                <li>Order: #326</li>--}}
                    {{--                                                <li>Date: 12/08/2019</li>--}}
                    {{--                                            </ul>--}}
                    {{--                                        </div>--}}
                    {{--                                        <!-- Buttons -->--}}
                    {{--                                        <div class="buttons-to-right">--}}
                    {{--                                            <a href="pages-checkout-page.html" class="button">Finish Payment</a>--}}
                    {{--                                        </div>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <div class="invoice-list-item">--}}
                    {{--                                            <strong>Professional Plan</strong>--}}
                    {{--                                            <ul>--}}
                    {{--                                                <li><span class="paid">Paid</span></li>--}}
                    {{--                                                <li>Order: #264</li>--}}
                    {{--                                                <li>Date: 10/07/2019</li>--}}
                    {{--                                            </ul>--}}
                    {{--                                        </div>--}}
                    {{--                                        <!-- Buttons -->--}}
                    {{--                                        <div class="buttons-to-right">--}}
                    {{--                                            <a href="pages-invoice-template.html" class="button gray">View--}}
                    {{--                                                Invoice</a>--}}
                    {{--                                        </div>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <div class="invoice-list-item">--}}
                    {{--                                            <strong>Professional Plan</strong>--}}
                    {{--                                            <ul>--}}
                    {{--                                                <li><span class="paid">Paid</span></li>--}}
                    {{--                                                <li>Order: #211</li>--}}
                    {{--                                                <li>Date: 12/06/2019</li>--}}
                    {{--                                            </ul>--}}
                    {{--                                        </div>--}}
                    {{--                                        <!-- Buttons -->--}}
                    {{--                                        <div class="buttons-to-right">--}}
                    {{--                                            <a href="pages-invoice-template.html" class="button gray">View--}}
                    {{--                                                Invoice</a>--}}
                    {{--                                        </div>--}}
                    {{--                                    </li>--}}
                    {{--                                    <li>--}}
                    {{--                                        <div class="invoice-list-item">--}}
                    {{--                                            <strong>Professional Plan</strong>--}}
                    {{--                                            <ul>--}}
                    {{--                                                <li><span class="paid">Paid</span></li>--}}
                    {{--                                                <li>Order: #179</li>--}}
                    {{--                                                <li>Date: 06/05/2019</li>--}}
                    {{--                                            </ul>--}}
                    {{--                                        </div>--}}
                    {{--                                        <!-- Buttons -->--}}
                    {{--                                        <div class="buttons-to-right">--}}
                    {{--                                            <a href="pages-invoice-template.html" class="button gray">View--}}
                    {{--                                                Invoice</a>--}}
                    {{--                                        </div>--}}
                    {{--                                    </li>--}}
                    {{--                                </ul>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
                <div class="dashboard-footer-spacer"></div>
            @else
                <div class="dashboard-headline margin-bottom-0">
                    <h3>Superb!<br/> You're now verified company</h3>
                    <span>All You Need to complete your profile and let</span>
                    <a href="{{ route('employer-profile.index') }}"
                       class="button ripple-effect button-sliding-icon margin-top-2">
                        Go To My Profile<i class="icon-feather-arrow-right-circle"></i>
                    </a>
                    <div class="welcome-text">
                        <img src="{{ asset('images/edit-profile.gif') }}" width="50%">
                    </div>
                    <div class="dashboard-footer-spacer"></div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('js-hooks')
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script>
        Chart.defaults.global.defaultFontFamily = "Nunito";
        Chart.defaults.global.defaultFontColor = '#888';
        Chart.defaults.global.defaultFontSize = '14';

        var ctx = document.getElementById('chart').getContext('2d');

        var chart = new Chart(ctx, {
            type: 'line',

            // The data for our dataset
            data: {
                // Information about the dataset
                datasets: [{
                    label: "Views",
                    backgroundColor: 'rgba(42,65,232,0.08)',
                    borderColor: '#2a41e8',
                    borderWidth: "3",
                    data: [196, 132, 215, 362, 210, 252],
                    pointRadius: 5,
                    pointHoverRadius: 5,
                    pointHitRadius: 10,
                    pointBackgroundColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointBorderWidth: "2",
                }]
            },
            // Configuration options
            options: {

                layout: {
                    padding: 10,
                },

                legend: {display: false},
                title: {display: false},

                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            borderDash: [6, 10],
                            color: "#d8d8d8",
                            lineWidth: 1,
                        },
                    }],
                    xAxes: [{
                        scaleLabel: {display: false},
                        gridLines: {display: false},
                    }],
                },

                tooltips: {
                    backgroundColor: '#333',
                    titleFontSize: 13,
                    titleFontColor: '#fff',
                    bodyFontColor: '#fff',
                    bodyFontSize: 13,
                    displayColors: false,
                    xPadding: 10,
                    yPadding: 10,
                    intersect: false
                }
            },
        });

    </script>
@endsection
