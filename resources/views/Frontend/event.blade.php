 @extends('layouts.theme')
 @section('frontend')
 <!-- Hero Section Begin -->
 <section class="hero-section set-bg bg-overlay" data-setbg="@if(isset($event) && !empty($event->bg_image))
    {{ asset('storage/'.$event->thumbnail) }}
    @else {{asset('frontend_assets/img/hero.jpg')}}
    @endif">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-text">
                    <span>@if(isset($event) && !empty($event->tagline))
                        {{$event->tagline}}
                        @else {{'event sub heading'}}
                    @endif</span>
                    <h2>@if(isset($event) && !empty($event->title))
                        {{$event->title}}
                        @else {{'event sub heading'}}
                    @endif</h2>
                    <a href="{{route('book.event', ['event' => $event->slug])}}" class="primary-btn">Join Event</a>
                </div>
            </div>
            <div class="col-lg-5">
                <img src=" {{asset('frontend_assets/img/hero-right.png')}}" alt="Image">
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Schedule Section Begin -->
<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Ongoing Event</h2>
                    <p>Important time and deadlines</p>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="schedule-tab shadow">
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
                                                    <a href="">
                                                        <h4 class="text-uppercase">
                                                            @if(isset($event))
                                                            {{$event->title}}
                                                            @else
                                                            Your Event Title
                                                            @endif
                                                        </h4>
                                                    </a>
                                                    @if($event)
                                                    <p class="font-weight-light text-dark">{{ $event->tagline}}</p>
                                                    @endif
                                                    @if($event)
                                                        <p>{!! $event->description !!}</p>
                                                    @else
                                                    <p class="pt-3">Your innovation partner for web, mobile, 
                                                        and AI solutions. Transforming ideas into reality, driving success together.</p>
                                                    @endif
                                                    <ul>
                                                        <li><i class="fa fa-user"></i>Organizer</li>
                                                        <li><strong>{{$event->organizer->name}}</strong>
                                                        </li>
                                                    </ul>
                                                    <div class="mt-5">
                                                        <a href="{{route('book.event', ['event' => $event->slug])}}" class="primary-btn">Join Event</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="sc-text">
                                                    <h4>When & Where</h4>
                                                    {{-- @if(isset($event))
                                                        {{$event->title}}
                                                    @endif --}}
                                                    <ul class="">
                                                        <li><i class="fa fa-clock-o"></i>@if(isset($event))
                                                            {{$event->start_date}}
                                                            @else
                                                            08:00 am - 10:00 AM
                                                        @endif </li>
                                                        <li class="mt-2"><i class="fa fa-map-marker"></i>@if(isset($event))
                                                            {{$event->location}}
                                                            @else
                                                            59 Breanne Canyon Suite, USA
                                                        @endif
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
@endsection