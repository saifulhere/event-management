@extends('layouts.theme')
@section('frontend')
@include('Frontend.hero')
@include('Frontend.count-down')
@include('Frontend.about')
{{-- @include('Frontend.event-time-organiger') --}}
@include('Frontend.all-events')
<!-- Team Member Section Begin -->
{{-- <section class="team-member-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Who’s speaking</h2>
                    <p>These are our communicators, you can see each person information</p>
                </div>
            </div>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="{{asset('frontend_assets/img/team-member/member-1.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text">
            <h5>Emma Sandoval</h5>
            <span>Speaker</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="{{asset('frontend_assets/img/team-member/member-2.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text">
            <h5>Emma Sandoval</h5>
            <span>Speaker</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="{{asset('frontend_assets/img/team-member/member-3.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text">
            <h5>Emma Sandoval</h5>
            <span>Speaker</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="{{asset('frontend_assets/img/team-member/member-4.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text">
            <h5>Emma Sandoval</h5>
            <span>Speaker</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="{{asset('frontend_assets/img/team-member/member-5.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text">
            <h5>Emma Sandoval</h5>
            <span>Speaker</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="{{asset('frontend_assets/img/team-member/member-6.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text">
            <h5>Emma Sandoval</h5>
            <span>Speaker</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="{{asset('frontend_assets/img/team-member/member-7.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text">
            <h5>Emma Sandoval</h5>
            <span>Speaker</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="{{asset('frontend_assets/img/team-member/member-8.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text">
            <h5>Emma Sandoval</h5>
            <span>Speaker</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="{{asset('frontend_assets/img/team-member/member-9.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text">
            <h5>Emma Sandoval</h5>
            <span>Speaker</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="{{asset('frontend_assets/img/team-member/member-10.jpg')}}">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text">
            <h5>Emma Sandoval</h5>
            <span>Speaker</span>
        </div>
    </div>
</section> --}}
<!-- Team Member Section End -->

<!-- Schedule Section Begin -->
<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Our Schedule</h2>
                    <p>Do not miss anything topic about the event</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="schedule-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                <h5>Day 1</h5>
                                <p>May 04, 2019</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                <h5>Day 2</h5>
                                <p>May 05, 2019</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                <h5>Day 3</h5>
                                <p>May 06, 2019</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                <h5>Day 4</h5>
                                <p>May 07, 2019</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-5" role="tab">
                                <h5>Day 5</h5>
                                <p>May 08, 2019</p>
                            </a>
                        </li>
                    </ul><!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Dealing with Difficult People</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-2.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>V7 Digital Photo Printing</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-3.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Beyond The Naked Eye</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-4.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Influencing The Influencer</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Dealing with Easy People</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-2.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>V7 Digital Photo Printing</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-3.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Beyond The Naked Eye</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-4.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Influencing The Influencer</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Dealing with Intermediate People</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-2.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>V7 Digital Photo Printing</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-3.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Beyond The Naked Eye</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-4.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Influencing The Influencer</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-4" role="tabpanel">
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Dealing with Expert People</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-2.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>V7 Digital Photo Printing</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-3.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Beyond The Naked Eye</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{('frontend_assets/img/schedule/schedule-4.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Influencing The Influencer</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-5" role="tabpanel">
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Dealing with Too Difficult People</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-2.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>V7 Digital Photo Printing</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-3.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Beyond The Naked Eye</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="st-content">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="sc-pic">
                                                <img src="{{asset('frontend_assets/img/schedule/schedule-4.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="sc-text">
                                                <h4>Influencing The Influencer</h4>
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <ul class="sc-widget">
                                                <li><i class="fa fa-clock-o"></i> 08:00 am - 10:00 AM</li>
                                                <li><i class="fa fa-map-marker"></i> 59 Breanne Canyon Suite, USA
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Schedule Section End -->

<!-- Pricing Section Begin -->
<section class="pricing-section set-bg spad" data-setbg="{{asset('frontend_assets/img/pricing-bg.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Ticket Pricing</h2>
                    <p>Get your event ticket plan</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-8">
                <div class="price-item">
                    <h4>1 Day Pass</h4>
                    <div class="pi-price">
                        <h2><span>$</span>129</h2>
                    </div>
                    <ul>
                        <li>One Day Conference Ticket</li>
                        <li>Coffee-break</li>
                        <li>Lunch and Networking</li>
                        <li>Keynote talk</li>
                        <li>Talk to the Editors Session</li>
                    </ul>
                    <a href="#" class="price-btn">Get Ticket <span class="arrow_right"></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="price-item top-rated">
                    <div class="tr-tag">
                        <i class="fa fa-star"></i>
                    </div>
                    <h4>Full Pass</h4>
                    <div class="pi-price">
                        <h2><span>$</span>199</h2>
                    </div>
                    <ul>
                        <li>One Day Conference Ticket</li>
                        <li>Coffee-break</li>
                        <li>Lunch and Networking</li>
                        <li>Keynote talk</li>
                        <li>Talk to the Editors Session</li>
                        <li>Lunch and Networking</li>
                        <li>Keynote talk</li>
                    </ul>
                    <a href="#" class="price-btn">Get Ticket <span class="arrow_right"></span></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-8">
                <div class="price-item">
                    <h4>Group Pass</h4>
                    <div class="pi-price">
                        <h2><span>$</span>79</h2>
                    </div>
                    <ul>
                        <li>One Day Conference Ticket</li>
                        <li>Coffee-break</li>
                        <li>Lunch and Networking</li>
                        <li>Keynote talk</li>
                        <li>Talk to the Editors Session</li>
                    </ul>
                    <a href="#" class="price-btn">Get Ticket <span class="arrow_right"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pricing Section End -->

<!-- latest BLog Section Begin -->
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Latest News</h2>
                    <p>Do not miss anything topic abput the event</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="latest-item set-bg large-item" data-setbg="{{asset('frontend_assets/img/blog/latest-b/latest-1.jpg')}}">
                    <div class="li-tag">Marketing</div>
                    <div class="li-text">
                        <h4><a href="./blog-details.html">Improve You Business Cards And Enchan Your Sales</a></h4>
                        <span><i class="fa fa-clock-o"></i> 19th May, 2019</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="latest-item set-bg" data-setbg="{{asset('frontend_assets/img/blog/latest-b/latest-2.jpg')}}">
                    <div class="li-tag">Experience</div>
                    <div class="li-text">
                        <h5><a href="./blog-details.html">All users on MySpace will know that there are millions of people out there.</a></h5>
                        <span><i class="fa fa-clock-o"></i> 19th May, 2019</span>
                    </div>
                </div>
                <div class="latest-item set-bg" data-setbg="{{asset('frontend_assets/img/blog/latest-b/latest-3.jpg')}}">
                    <div class="li-tag">Marketing</div>
                    <div class="li-text">
                        <h5><a href="./blog-details.html">A Pocket PC is a handheld computer, which features many of the same capabilities.</a></h5>
                        <span><i class="fa fa-clock-o"></i> 19th May, 2019</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- latest BLog Section End -->

<!-- Newslatter Section Begin -->
<section class="newslatter-section">
    <div class="container">
        <div class="newslatter-inner set-bg" data-setbg="{{asset('frontend_assets/img/newslatter-bg.jpg')}}">
            <div class="ni-text">
                <h3>Subscribe Newsletter</h3>
                <p>Subscribe to our newsletter and don’t miss anything</p>
            </div>
            <form action="#" class="ni-form">
                <input type="text" placeholder="Your email">
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
</section>
<!-- Newslatter Section End -->

<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title">
                    <h2>Location</h2>
                    <p>Get directions to our event center</p>
                </div>
                <div class="cs-text">
                    <div class="ct-address">
                        <span>Address:</span>
                        <p>01 Pascale Springs Apt. 339, NY City <br />United State</p>
                    </div>
                    <ul>
                        <li>
                            <span>Phone:</span>
                            (+12)-345-67-8910
                        </li>
                        <li>
                            <span>Email:</span>
                            info.colorlib@gmail.com
                        </li>
                    </ul>
                    <div class="ct-links">
                        <span>Website:</span>
                        <p>https://conference.colorlib.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cs-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52901.38789495531!2d-118.19465514866786!3d34.03523211493029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2cf71ad83ff9f%3A0x518b28657f4543b7!2sEast%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1579763856144!5m2!1sen!2sbd"
                        height="400" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

@endsection