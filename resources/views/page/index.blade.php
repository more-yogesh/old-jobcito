@extends('layouts.app')
{{--@section('title')--}}
{{--    {{$content[0]->page_title}}--}}
{{--@endsection--}}

@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ucfirst(str_replace('-',' ',$content[0]->title))}}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2">
                <div class="contact-location-info margin-bottom-50">


                </div>
                <section id="contact" class="margin-bottom-60">
                    <h3 class="headline margin-top-15 margin-bottom-35">{{ucfirst(str_replace('-',' ',$content[0]->title))}}</h3>
                    <div class="row">
                        <div class="col-md-12">
                            {!! $content[0]->content !!}
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection