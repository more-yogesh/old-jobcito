@extends('layouts.app')
@section('title', 'Company Profile')
@section('css-hooks')
    <style>
        #profile input, input[type=text], input[type=password], input[type=email], input[type=number], textarea, select {
            margin: 0 0 0px;
        }
    </style>
@endsection
@section('content')
    <div class="section gray">
        <div class="dashboard-content-inner">
            <div class="dashboard-headline">
                <h3>Complete Profiles Retain More Leads!</h3>
                <span>Candidates Spent 1/3 Time To Understand Company Profile.</span>
                @php $percentage = auth()->user()->employerProfile->percentage(); @endphp
                    @if($percentage < 100)
                        @include('components.progressbar', ['percentage' => $percentage])
                    @endif
                @if ($errors->any())
                    <div class="notification error closeable margin-top-10">
                        <p>{{ __('We Found some invalid inputs please check bellow form') }}</p>
                        <a class="close"></a>
                    </div>
                @endif
            </div>
            @if($percentage != 100)
            <div class="row" id="profile">
                <form method="POST" action="{{ route('employer-profile.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i>Basic Information</h3>
                            </div>
                            <div class="content with-padding padding-bottom-0">
                                <div class="row">
                                    <!--<div class="col-auto">-->
                                    <!--    <div class="avatar-wrapper" data-tippy-placement="bottom"-->
                                    <!--         title="Add or Edit Logo">-->
                                    <!--        @if($profile->getFirstMediaUrl('logos', 'square') == '')-->
                                    <!--            <img class="profile-pic" src="images/user-avatar-placeholder.png"-->
                                    <!--                 alt=""/>-->
                                    <!--        @else-->
                                    <!--            <img class="profile-pic" style="border:2px solid gray;"-->
                                    <!--                 src="{{ $profile->getFirstMediaUrl('logos', 'square') }}" alt=""/>-->
                                    <!--        @endif-->
                                    <!--        <div class="upload-button"></div>-->
                                    <!--        <input class="file-upload" type="file" accept="image/*" name="logo"/>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Company Name</h5>
                                                    <input type="text" name="name" class="with-border "
                                                           value="{{ old('name') ?? $profile->name }}">
                                                    @error('name')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>
                                                        Contact Number
                                                        <i class="help-icon" data-tippy-placement="right"
                                                           title="Mobile, Land line Number etc."></i>
                                                    </h5>
                                                    <input type="number" name="contact" class="with-border"
                                                           value="{{ old('contact') ?? $profile->contact }}"
                                                           maxlength="10" minlength="10">
                                                    @error('contact')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>
                                                        Website
                                                        <i class="help-icon" data-tippy-placement="right"
                                                           title="Website URL, reference link where employee can understand you."></i>
                                                    </h5>
                                                    <input type="url" name="website" class="with-border"
                                                           value="{{ old('website') ?? $profile->website }}">
                                                    @error('website')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>
                                                        Contact Email
                                                        <small>
                                                            <mark class="color">
                                                                Except: {{ auth()->user()->email }}</mark>
                                                        </small>
                                                    </h5>
                                                    <input type="email" class="with-border"
                                                           value="{{ old('contact_email') ?? $profile->contact_email }}"
                                                           name="contact_email">
                                                    @error('contact_email')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="dashboard-box">

                            <!-- Headline -->
                            <div class="headline">
                                <h3><i class="icon-material-outline-business"></i>Your Location</h3>
                            </div>
                            <div class="content with-padding padding-bottom-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <div class="submit-field">
                                                        <h5>Company Address1</h5>
                                                        <textarea cols="30" rows="3" class="with-border"
                                                                  name="address1">{{ old('address1')  ?? $profile->address1 }}</textarea>
                                                        @error('address1')
                                                        <span class="invalid-input">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Company Address2</h5>
                                                    <textarea cols="30" rows="3" class="with-border"
                                                              name="address2">{{ old('address2')  ?? $profile->address2 }}</textarea>
                                                    @error('address2')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>
                                                        Zipcode
                                                    </h5>
                                                    <input type="number" class="with-border"
                                                           value="{{ old('zipcode') ?? $profile->zipcode }}"
                                                           maxlength="6" minlength="6" name="zipcode">
                                                    @error('zipcode')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    @include('components.city-selector',
                                                    ['cityId' => $profile->city->id ?? null,
                                                     'state' => $profile->city->state ?? null,
                                                     'city' => $profile->city->city_name ?? null ])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="dashboard-box">
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i>Company Insides</h3>
                            </div>

                            <div class="content with-padding padding-bottom-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Total Employees</h5>
                                                    <input type="number" name="total_employees" class="with-border"
                                                           value="{{ old('total_employees')  ?? $profile->total_employees }}">
                                                    @error('total_employees')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Employee Average Salary(CTC)
                                                        <i class="help-icon" data-tippy-placement="right"
                                                           title="Total Monthly Salary Divided Number Of Employees"></i>
                                                    </h5>
                                                    <input type="number" class="with-border"
                                                           value="{{ old('average_salary') ?? $profile->average_salary }}"
                                                           maxlength="8" minlength="8" name="average_salary">
                                                    @error('average_salary')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>
                                                        Amenities
                                                    </h5>
                                                    <textarea cols="30" rows="6" class="with-border"
                                                              name="amenities">{{ old('amenities') ?? $profile->amenities }}</textarea>
                                                    @error('amenities')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>
                                                        Services
                                                    </h5>
                                                    <textarea cols="30" rows="6" class="with-border"
                                                              name="services">{{ old('services') ?? $profile->services }}</textarea>
                                                    @error('services')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>
                                                        Company Overview
                                                    </h5>
                                                    <textarea rows="10" class="with-border"
                                                              name="overview">{{ old('overview') ?? $profile->overview }}</textarea>
                                                    @error('overview')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 margin-bottom-40">
                        <button class="button ripple-effect big margin-top-30">Submit Profile</button>
                    </div>
                </form>
            </div>
            @else
            <div class="row">
                <h1>Thank you!</h1>
            </div>
            @endif
        </div>
    </div>
@endsection


