 <!-- Hero Section Begin -->
 <section class="hero-section set-bg bg-overlay" data-setbg="@if(isset($hero) && !empty($hero->bg_image))
    {{ asset('storage/'.$hero->bg_image) }}
    @else {{asset('frontend_assets/img/hero.jpg')}}
    @endif">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-text">
                    <span>@if(isset($hero) && !empty($hero->sub_heading))
                        {{$hero->sub_heading}}
                        @else {{'event sub heading'}}
                    @endif</span>
                    <h2>@if(isset($hero) && !empty($hero->heading))
                        {{$hero->heading}}
                        @else {{'event sub heading'}}
                    @endif</h2>
                    <a href="{{route('login')}}" class="primary-btn">Join Event</a>
                </div>
            </div>
            <div class="col-lg-5">
                <img src=" {{asset('frontend_assets/img/hero-right.png')}}" alt="Image">
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->