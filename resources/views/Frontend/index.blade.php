@extends('layouts.theme')
@section('frontend')
@include('Partials.hero')
@include('Partials.about')
@include('Partials.all-events')

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
                        <p>Sreemangal-3210, Moulvibazar Sylhet, <br />Bangladesh</p>
                    </div>
                    <ul>
                        <li>
                            <span>Phone:</span>
                            (+12)-345-67-8910
                        </li>
                        <li>
                            <span>Email:</span>
                            info@w3relations.com
                        </li>
                    </ul>
                    <div class="ct-links">
                        <span>Website:</span>
                        <p>https://w3relations.com/</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="cs-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52901.38789495531!2d-118.19465514866786!3d34.03523211493029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2cf71ad83ff9f%3A0x518b28657f4543b7!2sEast%20Los%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2sbd!4v1579763856144!5m2!1sen!2sbd" height="400" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

@endsection

