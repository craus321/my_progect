<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Evernet - Software &amp; Saas Startup HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-animation.css')}}">
    <link rel="stylesheet" href="{{asset('css/default.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>

<body>
<div id="preloader">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
        </div>
    </div>
</div>

<header class="transparent-header">
    <div id="header-sticky" class="header-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="/"><img src="img/logo/logo.png" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-9 text-right d-none d-lg-block">
                    <div class="menu-area d-inline-block">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="active"><a href="#">Home</a>
                                        <ul class="submenu">
                                            <li><a href="index.html">SaaS Home</a></li>
                                            <li><a href="index-hr-management.html">HR Managment</a></li>
                                            <li><a href="index-degital-marketing.html">Digital Marketing</a></li>
                                            <li><a href="index-accounts&amp;billing.html">Accounts &amp; Billing</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.html">About</a></li>
                                    <li><a href="portfolio.html">Portfolio</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="submenu">
                                            <li><a href="services.html">Services</a></li>
                                            <li><a href="services-single.html">Services Details</a></li>
                                            <li><a href="pricing.html">Pricing Plan</a></li>
                                            <li><a href="how-we-work.html">How We Work</a></li>
                                            <li><a href="404.html">404 Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Блог</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Контакты</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-btn d-none d-xl-inline-block">
                        <a href="/login" class="btn"><i class="fas fa-lock"></i>Авторизоваться</a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="content">
    @yield('content')
</div>

{{-- Если переменная $includeFooter не установлена или установлена в true, включаем футер --}}
@if (!isset($includeFooter) || $includeFooter)
    <footer>
        @include('footer')
    </footer>
@endif

</body>

    <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/element-in-view.js') }}"></script>
    <script src="{{ asset('js/paroller.js') }}"></script>
    <script src="{{ asset('js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


</html>
