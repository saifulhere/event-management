<!-- Home About Section Begin -->
<section class="home-about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="ha-pic">
                    <img src="{{asset('frontend_assets/img/h-about.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ha-text" style="padding-top: 10px;">
                    <p>@if(isset($about) && !empty($about->sub_heading))
                        {{$about->sub_heading}}
                        @else {{'sub heading'}}
                        @endif
                    </p>
                    <h2>@if(isset($about) && !empty($about->heading))
                        {{$about->heading}}
                        @else {{'Heading'}}
                        @endif
                    </h2>
                    <p>@if(isset($about) && !empty($about->description))
                        {{$about->description}}
                        @else {{'When I first got into the online advertising business, I was looking for the magical
                        combination that would put my website into the top search engine rankings, catapult me to
                        the forefront of the minds or individuals looking to buy my product, and generally make me
                        rich beyond my wildest dreams! After succeeding in the business for this long, I’m able to
                        look back on my old self with this kind of thinking and shake my head.'}}
                        @endif
                    </p>
                    <ul>
                        @if(isset($about) && !empty($about->features))
                            @foreach ($about->features as $feature)
                                <li><span class="icon_check"></span> {{ $feature->feature }}</li>
                            @endforeach
                        
                        @else
                            <li><span class="icon_check"></span> Event Features goes here </li>
                        @endif
                    </ul>
                    <a href="#" class="ha-btn">Discover Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home About Section End -->