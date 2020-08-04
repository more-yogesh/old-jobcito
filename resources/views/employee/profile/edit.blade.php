@extends('layouts.app')
@section('title', 'Edit Profile')
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
                <h3>Completed Profiles Has 2 Times More Chances To Get Hired By Clients!</h3>
                <span>Clients Spent 1/3 Time To Understand Your Profile.</span>
                @php $percentage = auth()->user()->employee->percentage(); @endphp
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
            @if($percentage < 100)
            <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                <div class="row" id="profile">
                    @csrf
                    <div class="col-xl-12">
                        <div class="dashboard-box margin-top-0">
                            <div class="headline">
                                <h3><i class="icon-material-outline-account-circle"></i>Basic Information</h3>
                            </div>
                            <div class="content with-padding padding-bottom-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Job Title</h5>
                                                    <input type="text" name="title" class="with-border "
                                                           value="{{ old('title') ?? $profile->title }}"
                                                    placeholder="E.g. Web Designer, PHP Developer, Laravel Developer">
                                                    @error('title')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>Your Name</h5>
                                                    <input type="text" name="name" class="with-border "
                                                           value="{{ old('name') ?? $profile->name }}"
                                                    placeholder="E.g. John Smith, Yovaraj Patel etc">
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
                                                           title="10 Digit Mobile Number"></i>
                                                    </h5>
                                                    <input type="number" name="contact" class="with-border"
                                                           value="{{ old('contact') ?? $profile->contact }}"
                                                           maxlength="10" minlength="10"
                                                    placeholder="E.g. 9876543210">
                                                    @error('contact')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>
                                                        D.O.B
                                                        <i class="help-icon" data-tippy-placement="right"
                                                           title="Date Of Birth Format YYYY-MM-DD"></i>
                                                    </h5>
                                                    <input type="text" id="dob" name="dob" class="with-border"
                                                           value="{{ old('dob') ?? $profile->dob }}"
                                                           placeholder="E.g. 1991-01-31 Format">
                                                    @error('dob')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--<div class="col-xl-6">-->
                                            <!--    <div class="submit-field">-->
                                            <!--        <h5>Share Your Experience-->
                                            <!--            <i class="help-icon" data-tippy-placement="right"-->
                                            <!--               title="Add your past job experience if you have any?"></i>-->
                                            <!--        </h5>-->
                                            <!--        <div class="switches-list margin-top-10">-->
                                            <!--            <div class="switch-container">-->
                                            <!--                <label class="switch">-->
                                            <!--                    <input type="checkbox" name="experience"-->
                                            <!--                           id="experience" {{ auth()->user()->experiences->count()>0 ? 'checked' : '' }}>-->
                                            <!--                    <span class="switch-button"></span> Are You Experienced?-->
                                            <!--                    <a href="{{ route('experience.index') }}" target="_blank">-->
                                            <!--                        <p id="add-experience" style="display: none;">-->
                                            <!--                            <mark class="color">-->
                                            <!--                                Click To Add Experience {{ auth()->user()->experiences->count()>0 ? auth()->user()->experiences->count().' Experience Added' : '' }}-->
                                            <!--                            </mark>-->
                                            <!--                        </p>-->
                                            <!--                    </a>-->
                                            <!--                </label>-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="dashboard-box">
                            <div class="headline">
                                <h3><i class="icon-material-outline-business"></i>Your Location</h3>
                            </div>
                            <div class="content with-padding padding-bottom-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>
                                                        Zipcode
                                                    </h5>
                                                    <input type="number" class="with-border"
                                                           value="{{ old('zipcode') ?? $profile->zipcode }}"
                                                           maxlength="6" minlength="6" name="zipcode"
                                                    placeholder="E.g. 394210(Area Pincode)">
                                                    @error('zipcode')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>City</h5>
                                                    <select class="selectpicker with-border with-ajax" data-size="7"
                                                            title="Select Your City" data-live-search="true"
                                                            name="city_id">s

                                                    </select>
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
                                <h3><i class="icon-material-outline-account-circle"></i>Professional Details</h3>
                            </div>

                            <div class="content with-padding padding-bottom-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>
                                                        Expected Salary
                                                        <i class="help-icon" data-tippy-placement="right"
                                                           title="This will show employers your yearly expected salary, Called package or CTC"></i>
                                                    </h5>
                                                    <input type="number" name="expected_salary" class="with-border"
                                                           value="{{ old('expected_salary')  ?? $profile->expected_salary }}"
                                                    placeholder="E.g. 600000">
                                                    @error('expected_salary')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="submit-field">
                                                    <h5>
                                                        Last Salary
                                                        <i class="help-icon" data-tippy-placement="right"
                                                           title="Add your last CTC or leave blank for freshers"></i>
                                                    </h5>
                                                    <input type="number" class="with-border"
                                                           value="{{ old('last_salary') ?? $profile->last_salary }}"
                                                           maxlength="8" minlength="8" name="last_salary" min="0"
                                                    placeholder="E.g. 500000">
                                                    @error('last_salary')
                                                    <span class="invalid-input">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{--                                    <div class="col-xl-6">--}}
                                            {{--                                        <div class="submit-field">--}}
                                            {{--                                            <h5>--}}
                                            {{--                                                Amenities--}}
                                            {{--                                            </h5>--}}
                                            {{--                                            <textarea cols="30" rows="6" class="with-border"--}}
                                            {{--                                                      name="amenities">{{ old('amenities') ?? $profile->amenities }}</textarea>--}}
                                            {{--                                            @error('amenities')--}}
                                            {{--                                            <span class="invalid-input">{{ $message }}</span>--}}
                                            {{--                                            @enderror--}}
                                            {{--                                        </div>--}}
                                            {{--                                    </div>--}}

                                            {{--                                    <div class="col-xl-6">--}}
                                            {{--                                        <div class="submit-field">--}}
                                            {{--                                            <h5>--}}
                                            {{--                                                Services--}}
                                            {{--                                            </h5>--}}
                                            {{--                                            <textarea cols="30" rows="6" class="with-border"--}}
                                            {{--                                                      name="services">{{ old('services') ?? $profile->services }}</textarea>--}}
                                            {{--                                            @error('services')--}}
                                            {{--                                            <span class="invalid-input">{{ $message }}</span>--}}
                                            {{--                                            @enderror--}}
                                            {{--                                        </div>--}}
                                            {{--                                    </div>--}}

                                            <div class="col-xl-12">
                                                <div class="submit-field">
                                                    <h5>
                                                        About Yourself
                                                        <i class="help-icon" data-tippy-placement="right"
                                                           title="This section will be describe what you want and who you are!"></i>
                                                    </h5>
                                                    <textarea rows="10" class="with-border"
                                                              name="overview"
                                                    placeholder="Write something about your self">{{ old('overview') ?? $profile->overview }}</textarea>
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
                    <div class="col-xl-12">
                        <button class="button ripple-effect big margin-top-30 margin-bottom-30">Submit Profile</button>
                    </div>
                </div>
            </form>
            @else
            <div class="section gray">
        <div class="dashboard-content-inner">
            <div class="section margin-top-20 margin-bottom-20">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="col-xl-5 offset-xl-3">
                                <div class="pricing-plan recommended">
                                    <div class="recommended-badge">Thank You!</div>
                                    <div class="welcome-text">
                                        <img src="{{ asset('images/done.gif') }}" height="80"/>
                                    </div>
                                    <strong class="margin-top-10 welcome-text">
                                        Your profile is complete now,
                                        <br/>
                                        Our Team will contact you soon with lots of opportunities,
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            @endif
        </div>
    </div>
@endsection
@section('js-hooks')
    <script src="{{ asset('js/ajax-boostrap-select.js') }}"></script>
    <script>
        var options = {
            ajax: {
                url: '{{ route('cities') }}',
                type: 'POST',
                dataType: 'json',
                {{--// Use "{{{q}}}" as a placeholder and Ajax Bootstrap Select will--}}
                // automatically replace it with the value of the search query.
                data: {
                    q: "@{{{q}}}",
                    _token: '{{ csrf_token() }}'
                }
            },
            locale: {
                emptyTitle: 'Find Your City'
            },
            log: 3,
            preprocessData: function (data) {
                var i, l = data.length, array = [];
                if (l) {
                    for (i = 0; i < l; i++) {
                        array.push($.extend(true, data[i], {
                            text: data[i].name,
                            subtext: data[i].state,
                            value: data[i].id,
                            data: {
                                subtext: data[i].name
                            }
                        }));
                    }
                }
                return array;
            }
        };
        $('.selectpicker').selectpicker().filter('.with-ajax').ajaxSelectPicker(options);
        $('.selectpicker').append('<option value="{{ $profile->city->id ?? '' }}" data-subtext="{{ $profile->city->state ?? '' }}" selected="selected">{{ $profile->city->city_name ?? '' }}</option>').selectpicker('refresh');
        $('select').trigger('load');
    </script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script>
        $("#dob").inputmask({"mask": "9999-99-99"});

        $(document).ready(function () {
            $('#experience').change(function () {
                checkExperience();
            })
        });

        function checkExperience() {
            if ($('#experience').is(':checked')) {
                $('#add-experience').fadeIn();
            } else {
                $('#add-experience').fadeOut();
            }
        }

        checkExperience();
    </script>
@endsection


