@extends('layouts.app')
@section('title', 'Notifications')
@section('css-hooks')
    <style>
        .mark-read{
            background: lightgray;
        }
    </style>
@endsection

@section('content')
    <div class="section gray">
        <div class="dashboard-content-inner">
            <h3>All Notifications</h3>
            <div class="row">
                <div class="col-xl-12">
                    <div class="dashboard-box">
                        <div class="headline">
                            <h3><i class="icon-material-baseline-notifications-none"></i> Notifications</h3>
                        </div>
                        <div class="content">
                            <ul class="dashboard-box-list">
                                @foreach($notifications as $notification)
                                    <li class="{{ $notification->read_at ? 'mark-read' : '' }}">
                                        <a href="{{ $notification->data['notificationLink']['link'] }}?notification={{ $notification->id }}">
                                            <span class="notification-icon">
                                                <i class="icon-material-outline-notifications"></i>
                                            </span>
                                            <span class="notification-text">
                                                {!! $notification->data['notificationLink']['text'] !!}
                                            <p style="color: gray">{{ $notification->created_at->diffForHumans() }}</p>
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.paginator', ['paginator' => $notifications])
            <div class="dashboard-footer-spacer"></div>
        </div>
    </div>

@endsection
