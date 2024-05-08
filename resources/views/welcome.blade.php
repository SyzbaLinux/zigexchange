<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zig Exchange</title>
    <!--=== Reset Css ===-->
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <!--=== Bootstrap ===-->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <!--=== Fontawesome icon ===-->
    <link rel="stylesheet" href="/assets/css/font-awesome-5.10.2.min.css">
    <!--=== Owl-Carousel ===-->
    <link rel="stylesheet" href="/assets/css/plugin/owl.carousel.min.css">
    <!--=== Magnific Popup===-->
    <link rel="stylesheet" href="/assets/css/plugin/magnific-popup.css">
    <!--=== Magnific Popup===-->
    <link rel="stylesheet" href="/assets/css/plugin/nice-select.css">
    <!--=== Main Css ===-->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!--=== Responsive Css ===-->
    <link rel="stylesheet" href="{{ asset('/assets/css/responsive.css') }}">
</head>
<body >
<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="loader loader-1">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
    </div>
</div>
<!-- preloader area end -->

<!-- Banners Start -->
<section class="banner" style="background-image: url('/assets/img/banner-bg.png')">


    @include('layouts.nav')

    <!-- Banner Start -->
    <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7 ">
                    <div class="banner-content">
                        <h1 class="head">ZiG Exchange</h1>
                        <img src="/assets/img/laptop-man.png" class="man-lap" alt="">
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-form">
                        <p class="text">I'd like to exchange</p>
                        <div class="courrency-select">
                            <form action="#!" id="faq_form">
                                <div class="form-group">
                                    <input type="text" name="number" value="1" placeholder="00.00" class="form-control">
                                </div>
                            </form>

                            <div class="language-select">
                                <select class="select-bar select2">
                                    <option value="">ZIG</option>
                                </select>
                            </div>
                        </div>
                        <p class="text">Currency From</p>
                        <div class="country">
                            <img src="assets/img/usa-flag.png" alt="">
                            <div class="language-select">
                                <select class="select-bar">
                                    <option value="">USA(USD)</option>
                                    <option value="">USE(USD)</option>
                                    <option value="">USA(USD)</option>
                                </select>
                            </div>
                        </div>

                        <p class="text">Currency To</p>
                        <div class="country">
                            <img src="assets/img/india-flag.png" alt="">
                            <div class="language-select">
                                <select class="select-bar">
                                    <option value="">INR</option>
                                    <option value="">USD</option>
                                    <option value="">USD</option>
                                </select>
                            </div>
                        </div>
                        {{--                        <a href="#" class="button button-1">Compare Providers</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
</section>

<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="subcribe-box" style="background: url('/assets/img/subscribe-bg.png');">
                    <h3 class="subcribe">To get exclusive updates and notifications </h3>
                    <div class="form-group">
                        <form action="#">
                            <input type="email" class="form-control " placeholder="Enter Your Email" name="email">
                            <button class="button-1">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="footer-box">
                    <a href="#"><img class="logo" src="/assets/img/logo.png" alt=""> </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="footer-box">
                    <ul class="footer-link">
                        <li><a href="#">About us</a></li>
                        <li>|</li>
                        <li><a href="#">How it works</a></li>
                        <li>|</li>
                        <li><a href="#">FAQ</a></li>
                        <li>|</li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12">
                <div class="raka"></div>
            </div>
            <div class="col-md-6">
                <div class="footer-bottom">
                    <p class="text">Copyright &copy; <a href="#">ZiG Exchange</a> | <a href="#">{{ date('Y') }}</a> </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-bottom">
                    <div class="social-style">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-skype"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== Scroll To Top Start ======-->
<div id="scrollUp" title="Scroll To Top">
    <i class="fas fa-arrow-up"></i>
</div>
<!--====== Scroll To Top End ======-->

<!--==================================================================-->
<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script src="/assets/js/proper-min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<!--=== All Plugin ===-->
<script src="/assets/js/plugin/waypoint.min.js"></script>
<script src="/assets/js/plugin/owl.carousel.min.js"></script>
<script src="/assets/js/plugin/jquery.rcounter.js"></script>
<script src="/assets/js/plugin/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/plugin/jquery.nice-select.min.js"></script>

<!--=== All Active ===-->
<script src="{{ asset('/assets/js/main.js') }}"></script>
</body>
</html>
