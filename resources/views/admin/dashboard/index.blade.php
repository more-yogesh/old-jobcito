@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <form method="GET" action="{{route('admin.index')}}">
        <input type="date" name="start_date">
        <input type="date" name="end_date">
        <input type="submit" name="submit" value="Submit">
    </form>
    <div class="fun-facts-container">
        <div class="fun-fact" data-fun-fact-color="#36bd78">
            <div class="fun-fact-text">
                <span>Total Company</span>
                <h4>{{$totalCompany}}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-line-awesome-building"></i></div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#b81b7f">
            <div class="fun-fact-text">
                <span>Total Employee</span>
                <h4>{{$totalCandidate}}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-material-outline-person-pin"></i></div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#efa80f">
            <div class="fun-fact-text">
                <span>Verified Company</span>
                <h4>{{$verifiedCompany}}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-material-outline-thumb-up"></i></div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#efa80f">
            <div class="fun-fact-text">
                <span>Non Verified Company</span>
                <h4>{{$nonVerifiedCompany}}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-material-outline-thumb-down"></i></div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#efa80f">
            <div class="fun-fact-text">
                <span>Verified Candidate</span>
                <h4>{{$verifiedCandidate}}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-material-outline-thumb-up"></i></div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#efa80f">
            <div class="fun-fact-text">
                <span>Non Verified Candidate</span>
                <h4>{{$nonVerifiedCandidate}}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-material-outline-thumb-down"></i></div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#efa100e">
            <div class="fun-fact-text">
                <span>Total Job Posts</span>
                <h4>{{$totalJobPosts}}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-line-awesome-align-justify"></i></div>
        </div>
        <div class="fun-fact" data-fun-fact-color="#b81b7f">
            <div class="fun-fact-text">
                <span>Job Applied</span>
                <h4>{{$totalAppliedJobs}}</h4>
            </div>
            <div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
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
@endsection
