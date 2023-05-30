<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Manup Template">
    <meta name="keywords" content="Manup, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manup | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container justify-content-between">
            <div class="logo">
                <a href="./index.html">
                    <img src="{{asset('frontend_assets/img/logo.png')}}" alt="">
                </a>
            </div>
            <div class="nav-menu d-flex justify-content-between">
                <div>
                    <nav class="mainmenu mobile-menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="./about-us.html">About</a></li>
                            <li><a href="./speaker.html">Speakers</a>
                                <ul class="dropdown">
                                    <li><a href="#">Jayden</a></li>
                                    <li><a href="#">Sara</a></li>
                                    <li><a href="#">Emma</a></li>
                                    <li><a href="#">Harriet</a></li>
                                </ul>
                            </li>
                            <li><a href="./schedule.html">Schedule</a></li>
                            <li><a href="./contact.html">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div>
                    <a href="{{route('admin.login')}}" class="primary-btn top-btn"><i class="fa fa-ticket"></i>Join Event</a>
                </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
    {{-- Start Content Area --}}
    <div>
        @yield('frontend')
    </div>
    {{-- End Content Area --}}

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="partner-logo owl-carousel">
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{asset('frontend_assets/img/partner-logo/logo-1.png')}}" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{asset('frontend_assets/img/partner-logo/logo-2.png')}}" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{asset('frontend_assets/img/partner-logo/logo-3.png')}}" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{asset('frontend_assets/img/partner-logo/logo-4.png')}}" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{asset('frontend_assets/img/partner-logo/logo-5.png')}}" alt="">
                    </div>
                </a>
                <a href="#" class="pl-table">
                    <div class="pl-tablecell">
                        <img src="{{asset('frontend_assets/img/partner-logo/logo-6.png')}}" alt="">
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-text">
                        <div class="ft-logo">
                            <a href="#" class="footer-logo"><img src="{{asset('frontend_assets/img/footer-logo.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Speakers</a></li>
                            <li><a href="#">Schedule</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        <div class="copyright-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="ft-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('frontend_assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('frontend_assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/main.js')}}"></script>
</body>

</html>