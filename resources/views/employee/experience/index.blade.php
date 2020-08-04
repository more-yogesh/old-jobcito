@extends('layouts.app')
@section('title', 'Add Experience')
@section('css-hooks')
    <style>
        #profile input, input[type=text], input[type=password], input[type=email], input[type=number], textarea, select {
            margin: 0 0 0px;
        }

        #profile .invalid-input {
            color: red !important;
        }

        table form td {
            margin: 0px;
            padding: 0px;
        }
    </style>
@endsection
@section('content')
    <div class="secction gray">
        <div class="dashboard-content-inner">
            <div class="dashboard-headline">
                <h3>Manage Your Work Experience Here</h3>
                <span>There are 88% chances for experience job seeker to get desired company and salary hike.</span>
            </div>
            <div class="row">
                @csrf
                <div class="col-xl-12">
                    <div id="test1" class="dashboard-box">
                        <div class="headline">
                            <h3><i class="icon-feather-bar-chart"></i> Manage Experience</h3>
                        </div>
                        <div class="content with-padding">
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <table class="basic-table">
                                        <tbody>
                                        <tr>
                                            <th>No.</th>
                                            <th>Company Name</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Designation</th>
                                            <th>Salary</th>
                                            <th>Payment History?</th>
                                            <th>Action</th>
                                        </tr>
                                        @forelse($experiences as $experience)
                                            <tr>
                                                <td data-label="No">{{ $i = $loop->iteration }}</td>
                                                <td data-label="Copany Name">{{ $experience->company_name }}</td>
                                                <td data-label="Start date">{{ $experience->from_date }}</td>
                                                <td data-label="End date">{{ $experience->to_date }}</td>
                                                <td data-label="Designation">{{ $experience->designation }}</td>
                                                <td data-label="Salary">INR {{ $experience->salary }}.00</td>
                                                <td data-label="Verified Salary">{{ $experience->salary_sleep }}</td>
                                                <td>
                                                    <form action="{{ route('experience.destroy', $experience->id) }}"
                                                          method="POST" onsubmit="return confirmDelete()">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="button ripple-effect" style="background: red;"><i
                                                                class="icon-feather-trash-2"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                        <tr>
                                            <form method="post" action="{{ route('experience.store') }}">
                                                @csrf
                                                <td>{{ $i ?? 1 }}</td>
                                                <td>
                                                    <input class="with-border" type="text" name="company_name"
                                                           value="{{ old('company_name') }}" placeholder="Company Name">
                                                    @error('company_name')
                                                    <span class="invalid-input">
                                                {{ $message }}
                                            </span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input class="with-border" type="text" name="from_date"
                                                           value="{{ old('from_date') }}" id="from_date"
                                                           placeholder="Starting Date">
                                                    @error('from_date')
                                                    <span class="invalid-input">
                                                {{ $message }}
                                            </span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input class="with-border" type="text" name="to_date"
                                                           value="{{ old('to_date') }}" id="to_date"
                                                           placeholder="End Date">
                                                    @error('to_date')
                                                    <span class="invalid-input">
                                                {{ $message }}
                                            </span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input class="with-border" type="text" name="designation"
                                                           value="{{ old('designation') }}" placeholder="Your Post">
                                                    @error('designation')
                                                    <span class="invalid-input">
                                                {{ $message }}
                                            </span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input class="with-border" type="number" name="salary"
                                                           value="{{ old('salary') }}" placeholder="CTC Salary">
                                                    @error('salary')
                                                    <span class="invalid-input">
                                                {{ $message }}
                                            </span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="salary_sleep" name="salary_sleep"
                                                               value="yes" {{ old('salary_sleep') ? 'checked' : '' }}>
                                                        <label for="salary_sleep"><span class="checkbox-icon"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="button ripple-effect"><i
                                                            class="icon-material-outline-add"></i></button>
                                                </td>
                                            </form>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-footer-spacer"></div>

@endsection
@section('js-hooks')
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
    <script>
        function confirmDelete() {
            if (confirm('Are sure you want to delete this experience?')) {
                return true;
            }
            return false;
        }

        $("#from_date, #to_date").inputmask({"mask": "9999-99-99"});
    </script>
@endsection


