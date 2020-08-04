@extends('layouts.app')
@section('title')
    Contact
@endsection
@section('content')
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2">
                <div class="contact-location-info margin-bottom-50">
                    <div class="contact-address">
                        <ul>
                            <li class="contact-address-headline">Our Office</li>
                            <li>501, Nathubhai Towers, Udhana(394210), Surat(Gujarat, India)</li>
                            <li>
                                <a href="mailto:contact@jobcito.com">
                                    <span class="__cf_email__">
                                        contact@jobcito.com
                                    </span>
                                </a>
                            </li>
                            {{--                            <li>--}}
                            {{--                                <div class="freelancer-socials">--}}
                            {{--                                    <ul>--}}
                            {{--                                        <li><a href="#" title="Dribbble" data-tippy-placement="top"><i class="icon-brand-dribbble"></i></a></li>--}}
                            {{--                                        <li><a href="#" title="Twitter" data-tippy-placement="top"><i class="icon-brand-twitter"></i></a></li>--}}
                            {{--                                        <li><a href="#" title="Behance" data-tippy-placement="top"><i class="icon-brand-behance"></i></a></li>--}}
                            {{--                                        <li><a href="#" title="GitHub" data-tippy-placement="top"><i class="icon-brand-github"></i></a></li>--}}

                            {{--                                    </ul>--}}
                            {{--                                </div>--}}
                            {{--                            </li>--}}
                        </ul>

                    </div>

                </div>
                <section id="contact" class="margin-bottom-60">
                    @if(session('sent'))
                        <div class="notification success closeable">
                            <p>{{session('sent')}}</p>
                            <a class="close"></a>
                        </div>
                        <img src="{{ asset('images/thanks.gif') }}">
                    @else
                        <h3 class="headline margin-top-15 margin-bottom-35">Any questions? Feel free to contact us!</h3>
                        <form method="post" name="contact" id="contact" autocomplete="on"
                              action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-with-icon-left">
                                        <input class="with-border"
                                               name="name" type="text" id="name"
                                               placeholder="Your Good Name"
                                               required="required"
                                               value="{{ old('name') }}"
                                        />
                                        <i class="icon-material-outline-account-circle"></i>
                                        @error('name')
                                        <div class="invalid-input">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-with-icon-left">
                                        <input class="with-border" name="email" type="email" id="email"
                                               placeholder="Email Address"
                                               value="{{ old('email') }}"
                                               required="required"/>
                                        <i class="icon-material-outline-email"></i>
                                        @error('error')
                                        <div class="invalid-input">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="input-with-icon-left">
                                <input class="with-border"
                                       name="subject"
                                       type="text"
                                       id="subject"
                                       value="{{ old('subject') }}"
                                       placeholder="Subject"
                                />
                                <i class="icon-material-outline-assignment"></i>
                                @error('subject')
                                <div class="invalid-input">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                            <textarea class="with-border" name="message" cols="40" rows="5" id="message"
                                      placeholder="Message" spellcheck="true"
                                      required="required">{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-input">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <input type="submit" class="submit button margin-top-15" id="submit" value="Send Message"/>
                        </form>
                    @endif
                </section>
            </div>
        </div>
    </div>
@endsection
