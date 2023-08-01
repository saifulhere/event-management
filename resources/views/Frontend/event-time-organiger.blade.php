<!-- Schedule Section Begin -->
<section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Event Organizer</h2>
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
                                                <h4 class="text-uppercase">@if(isset($organizer))
                                                    {{$organizer->organizer_name}}
                                                    @else
                                                    TechStar Solutions
                                                @endif</h4>
                                                @if($organizer)
                                                <p class="font-weight-light text-dark">{{ $organizer->tag_line}}</p>
                                                @endif
                                                @if($organizer)
                                                    <p>{{ $organizer->about_organizer}}</p>
                                                @else
                                                <p class="pt-3">Your innovation partner for web, mobile, 
                                                    and AI solutions. Transforming ideas into reality, driving success together.</p>
                                                @endif
                                                <ul>
                                                    <li><i class="fa fa-user"></i> John Smith</li>
                                                    <li><i class="fa fa-envelope"></i> john@Colorlib.com
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="sc-text">
                                                <h4>When & Where</h4>
                                                <ul class="">
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
    </div>
</section>
<!-- Schedule Section End -->