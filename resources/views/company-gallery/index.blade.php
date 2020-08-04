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
<div class="dashboard-headline">
    <h3>Change Your Password</h3>
</div>
<form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
    <div class="row">
        @csrf
        <div class="col-xl-4">
            <div id="test" class="dashboard-box">
                <div class="headline">
                    <h3><i class="icon-line-awesome-file-image-o"></i>Gallery</h3>
                </div>
                <div class="content with-padding">
                        <div class="welcome-text">
                            <div class="avatar-wrapper" data-tippy-placement="bottom" title="Add or Edit Gallery"
                                 style="display: block;margin:0 auto;">
                                <img class="profile-pic" src="images/user-avatar-placeholder.png" alt="" width="100%"/>
                                <div class="upload-button"></div>
                                <input class="file-upload" type="file" accept="image/*" name="gallery"/>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <button class="button ripple-effect big margin-top-30">Update Gallery</button>
        </div>
    </div>
</form>
<div class="dashboard-footer-spacer"></div>
@endsection
