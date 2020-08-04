@extends('layouts.app')

@section('content')
    <div class="dashboard-headline">
        <h3>Create Your Own Page</h3>
        @if ($errors->any())
            <div class="notification error closeable margin-top-10">
                <p>{{ __('We Found some invalid inputs please check bellow form') }}</p>
                <a class="close"></a>
            </div>
        @endif
    </div>
    <div class="row" id="profile">
        <form method="POST" action="{{ route('page.store') }}">
            @csrf
            <div class="col-xl-12">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3><i class="icon-material-outline-account-circle"></i>Edit  Page</h3>
                    </div>

                    <div class="content with-padding padding-bottom-0">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Page Title</h5>
                                            <input type="text" name="page_title" class="with-border"
                                                   value="{{}}">
                                            @error('page_title')
                                            <span class="invalid-input">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Status</h5>
                                            <select class="" data-size="7"
                                                    title="Select Your City"  name="status">
                                                <option disabled>Select status</option>
                                                <option value="on">On</option>
                                                <option value="off">Off</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-input">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>
                                                Meta Description
                                            </h5>
                                            <textarea cols="30" rows="6" class="with-border"
                                                      name="meta_description"></textarea>
                                            @error('meta_description')
                                            <span class="invalid-input">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>
                                                Meta Keywords
                                            </h5>
                                            <textarea cols="30" rows="6" class="with-border"
                                                      name="meta_keywords"></textarea>
                                            @error('meta_keywords')
                                            <span class="invalid-input">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>
                                                Content
                                            </h5>
                                            <textarea rows="10" class="with-border content"
                                                      name="content"></textarea>
                                            @error('content')
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
                <button class="button ripple-effect big margin-top-30">Save Page</button>
            </div>
        </form>
    </div>
    <div class="dashboard-footer-spacer"></div>
@endsection

@section('js-hooks')
    <script src="{{ asset('js/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            selector:'textarea.content',
            width: 1200,
            height: 300
        });
    </script>
@endsection