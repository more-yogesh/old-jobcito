@extends('layouts.app')
@section('title', 'Edit Job')
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
    </style>
@endsection
@section('content')
    <div class="section gray">
        <div class="dashboard-content-inner">
            <div class="dashboard-headline">
                <h3>Edit Post a Job</h3>
                <span>Fill all fields, So job seeker can easily find out your post.</span>
            </div>
            <div class="row">
                <form method="POST" action="{{ route('jobs.update', $job->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-xl-12">
                        <div id="test1" class="dashboard-box">
                            <div class="headline">
                                <h3><i class="icon-feather-folder-plus"></i> Job Submission Form</h3>
                            </div>
                            <div class="content with-padding">
                                <div class="row">

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Job Title</h5>
                                            <input type="text" class="with-border" name="title"
                                                   value="{{ old('title') ?? $job->title }}">
                                            @error('title')
                                            <span class="invalid-input">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>
                                                Job Type
                                            </h5>
                                            <select class="selectpicker with-border" data-size="7"
                                                    title="Select Job Type"
                                                    name="type">
                                                @foreach($jobTypes as $type)
                                                    <option
                                                        value="{{ $type->id }}" {{ $job->type == $type->id ? 'selected' : '' }}>{{ $type->type }}</option>
                                                @endforeach
                                            </select>
                                            @error('type')
                                            <span class="invalid-input">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Job Category</h5>
                                            <select class="selectpicker with-border" data-size="7"
                                                    title="Select Category"
                                                    name="category">
                                                @foreach($categories as $category)
                                                    <option
                                                        value="{{ $category->id }}" {{  $job->categories[0]->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                            <span class="invalid-input">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>
                                                Salary In CTC(Upto)
                                                <i class="help-icon" data-tippy-placement="right" title="Cost to company (CTC) is a term for the total salary package of an employee.
                                                         It indicates the total amount of expenses an employer (organization) spends on an employee during one year."></i>
                                            </h5>
                                            <div class="input-with-icon">
                                                <input class="with-border" type="number" placeholder="Salary per year"
                                                       name="salary_upto"
                                                       value="{{ old('salary_upto')  ?? $job->salary_upto }}">
                                                <i class="currency">INR</i>
                                                @error('salary_upto')
                                                <span class="invalid-input">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            @php $tags = [];
                                    foreach($job->tags as $key => $tag){
                                        $tags[$key] = $tag->name;
                                    }
                                            @endphp
                                            <h5>Job Related Tags (Max 6 tags)</h5>
                                            <input type="text"
                                                   value="{{ old('tags') ?? implode(',', array_values($tags)) }}"
                                                   class="form-control" name="tags"
                                                   id="tags"/>
                                            @error('tags')
                                            <span class="invalid-input">
                                        {{ $message }}
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Job Description</h5>
                                            <textarea cols="30" rows="5" class="with-border"
                                                      name="description">{{ old('description') ?? $job->description }}</textarea>
                                            @error('description')
                                            <span class="invalid-input">
                                            {{ $message }}
                                        </span>
                                            @enderror
                                            <div class="uploadButton margin-top-30">
                                                <input class="uploadButton-input" type="file" accept="image/*"
                                                       id="upload" name="image"/>
                                                <label class="uploadButton-button ripple-effect" for="upload">Upload
                                                    Files</label>
                                                <span class="uploadButton-file-name">Image that might be helpful in describing your job.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        @if($job->getFirstMediaUrl('job_post_images', 'square') == '')
                                            <img src="{{ asset('images/company-logo-05.png') }}" height="200">
                                        @else
                                            <img src="{{ $job->getFirstMediaUrl('job_post_images', 'square') }}"
                                                 height="200"/>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="button ripple-effect big margin-top-30 margin-bottom-30">
                            <i class="icon-feather-plus"></i> Update a Job
                        </button>
                    </div>
                </form>
            </div>
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
    </script>
@endsection
