@extends('layouts.app')
@section('css-hooks')
    <style>
        #profile input, input[type=text], input[type=password], input[type=email], input[type=number], textarea, select {
            margin: 0 0 0px;
        }

        #profile .invalid-input {
            color: red !important;
        }
    </style>
@endsection
@section('content')
    <!-- Dashboard Headline -->
    <div class="dashboard-headline">
        <h3>Change Your Password</h3>
    </div>
        <form method="POST" action="{{ route('setting.update') }}">
    <div class="row">
            @csrf
            <div class="col-xl-12">
                <div id="test1" class="dashboard-box">
                    <div class="headline">
                        <h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
                    </div>
                    <div class="content with-padding">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Current Password</h5>
                                    <input type="password" class="with-border" name="current_password" required>
                                    @error('current_password')
                                    <span class="invalid-input">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>New Password</h5>
                                    <input type="password" class="with-border" name="new_password" required>
                                    @error('new_password')
                                    <span class="invalid-input">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Repeat New Password</h5>
                                    <input type="password" class="with-border" name="new_confirm_password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <button class="button ripple-effect big margin-top-30">Update Password</button>
            </div>
    </div>
        </form>
    <div class="dashboard-footer-spacer"></div>
@endsection


