<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('seo')
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/theme/favicon.svg')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css?v=6.0')}}">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/nouislider/nouislider.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/nouislider/nouislider.css')}}"/>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Rubik:ital,wght@0,300..900;1,300..900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <style>
        .newsletter .newsletter-inner img{
            right: 50px;
            left:unset;
        }
        .product-cart-wrap .product-img-action-wrap {
            max-height: 340px;
        }
        .banner-left-icon .banner-icon {
            max-width: 100px;
            margin-right: 0;
        }
        .main-menu > nav > ul > li > a{
            font-size: 14px;
        }
        .main-menu.main-menu-padding-1 > nav > ul > li {
            padding: 0 10px;
        }
    </style>
</head>

<body>
    
    <a class="email-bt" href="https://api.whatsapp.com/send?phone=201116551266" target="_blank">
        <div class="text-call">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-whatsapp" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
            </svg>
        </div>
    </a>
    <style>
        .email-bt {
            background: #00984d;
            border: 2px solid #f4fff0;
            border-radius:50%;
            box-shadow:0 8px 10px rgba(249,92,24,0.3);
            cursor:pointer;
            height: 55px;
            text-align: center;
            width: 55px;
            position: fixed;
            left: 4%;
            bottom: 7%;
            z-index:999;
            transition:.3s;
            -webkit-animation:email-an linear 1s infinite;
            animation:email-an linear 1s infinite;
        }

        .email-bt .text-call{
            height:68px;      
            border-radius:50%;
            position:relative;
            overflow:hidden;
            margin-top: 12px;
        }

        @-webkit-keyframes email-an {
                0% {
                box-shadow:0 8px 10px rgba(133, 249, 24, 0.3),0 0 0 0 rgba(88, 249, 24, 0.2),0 0 0 0 rgba(43, 249, 24, 0.2)
        }
        40% {
                box-shadow:0 8px 10px rgba(133,249,24,0.3),0 0 0 15px rgba(88,249,24,0.2),0 0 0 0 rgba(43,249,24,0.2)
        }
        80% {
                box-shadow:0 8px 10px rgba(133,249,24,0.3),0 0 0 30px rgba(50, 249, 24, 0),0 0 0 26.7px rgba(50,249,24,0.067)
        }
        100% {
                box-shadow:0 8px 10px rgba(133,249,24,0.3),0 0 0 30px rgba(50,249,24,0),0 0 0 40px rgba(50,249,24,0.0)
        }
        }@keyframes email-an {
                0% {
                box-shadow:0 8px 10px rgba(133,249,24,0.3),0 0 0 0 rgba(24, 249, 35, 0.2),0 0 0 0 rgba(24,249,24,0.2)
        }
        40% {
                box-shadow:0 8px 10px rgba(133,249,24,0.3),0 0 0 15px rgba(24,249,24,0.2),0 0 0 0 rgba(24,249,24,0.2)
        }
        80% {
                box-shadow:0 8px 10px rgba(133,249,24,0.3),0 0 0 30px rgba(61, 249, 24, 0),0 0 0 26.7px rgba(61,249,24,0.067)
        }
        100% {
                box-shadow:0 8px 10px rgba(133,249,24,0.3),0 0 0 30px rgba(61,249,24,0),0 0 0 40px rgba(61,249,24,0.0)
        }
        }

        @keyframes opsimple {
        0% {
            opacity: 0;
        }
        40% {
            opacity: 1;
        }

        80% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
        }

        @-webkit-keyframes opsimple {
        0% {
            opacity: 0;
        }
        40% {
            opacity: 1;
        }
        80% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
        }
    </style>

    <header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <span>Siam Ocean for Food Industries</span>
        </div>
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container" style="max-width: 1610px;">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-4">
                        <div>
                            Welcome To Siam Ocean
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="header-info header-info-right text-center">
                            <ul>
                                <li>Need help ? Call Us : <strong class="mx-2"> {{ \App\Models\Option::get('phone') }} </strong></li>
                                <li>
                                    <a class="language-dropdown-active" href="#">English</a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a href="http://siamocean.zendle.net" class="language-dropdown-active"><img src="{{asset('assets/imgs/theme/flag-en.png')}}" alt="">English </i></a>
                                        </li>
                                        <li>
                                            <a href="http://siamocean.zendle.net/en-ar/"><img src="{{asset('assets/imgs/theme/flag-ar.png')}}" alt="">Arabic</a>
                                        </li>
                                        <li>
                                            <a href="http://siamocean.zendle.net/en-fr/"><img src="{{asset('assets/imgs/theme/flag-fr.png')}}" alt="">Français</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container" style="max-width: 1610px;">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href='{{url("/")}}'>
                            <img  class="p-3" src="{{ \App\Models\Option::logo() }}" alt="{{ \App\Models\Option::get('site_title') }}">
                        </a>
                    </div>
                    <div class="logo logo-width-1">
                        <a href='{{url("/")}}'>
                            <img  class="p-3" src="{{ \App\Models\Option::logo() }}" alt="{{ \App\Models\Option::get('site_title') }}">
                        </a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            
                            <a class="categories-button-active" href="#">
                                <span class="fi-rs-apps"></span> <span class="et">All</span> Categories
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                <div class="row">
                                    @foreach(App\Models\Term::where('taxonomy','product_category')->whereBetween('ID', [1, 6])->get() as $term)
                                    <div class="col-lg-6">
                                        <div class="categories-dropdown-wrap">
                                            <a href='{{$term->url()}}'> <img src="{{asset('assets/imgs/theme/icons/category-2.svg')}}" alt="">{{$term->name}}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="more_slide_open" style="display: none">
                                    <div class="row">
                                        @foreach(App\Models\Term::where('taxonomy','product_category')->whereBetween('ID', [7, 11])->get() as $term)
                                        <div class="col-lg-6">
                                            <div class="categories-dropdown-wrap">
                                                <a href='{{$term->url()}}'> <img src="{{asset('assets/imgs/theme/icons/category-2.svg')}}" alt="">{{$term->name}}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="more_categories bg-light py-2"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    <li>
                                        <a href='{{ \App\Models\Post::find(1)->url() }}' class="{{ request()->is('/') ? 'active' : '' }} ">Home</a>
                                    </li>
                                    <li>
                                        <a href='{{ \App\Models\Post::find(2)->url() }}' class="{{ request()->is('about') ? 'active' : '' }} ">About</a>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('products') || request()->is('private-products')  ? 'active' : '' }} ">Products <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href='{{ \App\Models\Post::find(80)->url() }}' class="{{ request()->is('private-label-products') ? 'active' : '' }} ">Private Label Products</a></li>
                                            <li><a href='{{ \App\Models\Post::find(3)->url() }}' class="{{ request()->is('products') ? 'active' : '' }} ">Filter Page</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="{{ request()->is('safana-brand') || request()->is('fiorella-brand')  ? 'active' : '' }} ">Brands <i class="fi-rs-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href='{{ \App\Models\Post::find(7)->url() }}' class="{{ request()->is('safana-brand') ? 'active' : '' }} ">Safana Brand</a></li>
                                            <li><a href='{{ \App\Models\Post::find(8)->url() }}' class="{{ request()->is('fiorella-brand') ? 'active' : '' }} ">Fiorella Brand</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href='{{ \App\Models\Post::find(81)->url() }}' class="{{ request()->is('markets') ? 'active' : '' }} ">Markets</a>
                                    </li>
                                    <li>
                                        <a href='{{ \App\Models\Post::find(4)->url() }}' class="{{ request()->is('blog') ? 'active' : '' }} ">Blog</a>
                                    </li>
                                    <li>
                                        <a href='{{ \App\Models\Post::find(5)->url() }}' class="{{ request()->is('faq') ? 'active' : '' }} ">FAQs</a>
                                    </li>
                                    <li>
                                        <a href='{{ \App\Models\Post::find(6)->url() }}' class="{{ request()->is('contact') ? 'active' : '' }} ">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href='{{url("/")}}'>
                        <img  class="p-3" src="{{ \App\Models\Option::logo() }}" alt="{{ \App\Models\Option::get('site_title') }}">
                    </a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href='{{ \App\Models\Post::find(1)->url() }}' class="{{ request()->is('/') ? 'active' : '' }} ">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='{{ \App\Models\Post::find(2)->url() }}' class="{{ request()->is('about') ? 'active' : '' }} ">About</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a>Products</a>
                                <ul class="dropdown">
                                    <li><a href='{{ \App\Models\Post::find(80)->url() }}' class="{{ request()->is('private-label-products') ? 'active' : '' }} ">Private Label Products</a></li>
                                    <li><a href='{{ \App\Models\Post::find(3)->url() }}' class="{{ request()->is('products') ? 'active' : '' }} ">Filter Page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a>Brands</a>
                                <ul class="dropdown">
                                    <li><a href='{{ \App\Models\Post::find(7)->url() }}' class="{{ request()->is('safana-brand') ? 'active' : '' }} ">Safana Brand</a></li>
                                    <li><a href='{{ \App\Models\Post::find(8)->url() }}' class="{{ request()->is('fiorella-brand') ? 'active' : '' }} ">Fiorella Brand</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='{{ \App\Models\Post::find(81)->url() }}' class="{{ request()->is('markets') ? 'active' : '' }} ">Our Markets</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='{{ \App\Models\Post::find(4)->url() }}' class="{{ request()->is('blog') ? 'active' : '' }} ">Blog</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='{{ \App\Models\Post::find(5)->url() }}' class="{{ request()->is('faq') ? 'active' : '' }} ">FAQs</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='{{ \App\Models\Post::find(6)->url() }}' class="{{ request()->is('contact') ? 'active' : '' }} ">Contact Us</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="http://siamocean.zendle.net">English</a></li>
                                    <li><a href="http://siamocean.zendle.net/en-ar/">Arabic</a></li>
                                    <li><a href="http://siamocean.zendle.net/en-fr/">Français</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="tel:{{ \App\Models\Option::get('phone') }}"><i class="fi-rs-headphones"></i>{{ \App\Models\Option::get('phone') }} </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    @if(is_array($social = json_decode(\App\Models\Option::get('social'),1)))
                        @foreach($social as $key => $val)
                            @if(!empty($val))
                                <a class="ft-sl-facebook ft-sl-generic me-3" rel="noopener" title="{{ $key }}" href="{{ $val }}" target="_blank"><img src="{{asset('assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt=""></a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <main class="main">
        @yield('content')
    </main>



    <footer class="main">
        <section class="newsletter mb-15 wow animate__animated animate__fadeInUp" data-wow-delay="2">
            <div class="container" style="max-width: 1610px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="position-relative newsletter-inner" style="padding: 120px 78px;">
                            <div class="newsletter-content">
                                <h2 class="mb-20">
                                    Contact Us Now
                                </h2>
                                <p class="mb-45">Start with <span class="text-brand">Siam Ocean</span></p>
                                <a href="{{ \App\Models\Post::find(6)->url() }}" class="btn" type="submit">Send Message</a>
                            </div>
                            <img src="{{asset('assets/imgs/banner/banner-5.png')}}" alt="newsletter">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured section-padding mt-25">
            <div class="container" style="max-width: 1610px;">
                <div class="row">
                    <div class="col-lg-12 text-center mb-35">
                        <div class="title">
                            <h3>Our <span style="color: #00984d;">Certificates</span></h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0 d-grid my-2">
                        <div class="banner-left-icon wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="banner-icon m-auto">
                                <div>
                                    <img src="{{asset('assets/imgs/certificates/cer-1.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12 col-sm-6 d-grid my-2">
                        <div class="banner-left-icon wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="banner-icon m-auto">
                                <div>
                                    <img src="{{asset('assets/imgs/certificates/cer-2.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12 col-sm-6 d-grid my-2">
                        <div class="banner-left-icon wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="banner-icon m-auto">
                                <div>
                                    <img src="{{asset('assets/imgs/certificates/cer-4.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12 col-sm-6 d-grid my-2">
                        <div class="banner-left-icon wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <div class="banner-icon m-auto">
                                <div>
                                    <img src="{{asset('assets/imgs/certificates/cer-6.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12 col-sm-6 d-grid my-2">
                        <div class="banner-left-icon wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                            <div class="banner-icon m-auto">
                                <div>
                                    <img src="{{asset('assets/imgs/certificates/cer-3.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-12 col-sm-6 d-grid my-2">
                        <div class="banner-left-icon wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                            <div class="banner-icon m-auto">
                                <div>
                                    <img src="{{asset('assets/imgs/certificates/cer-5.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid" style="border-top-left-radius: 70px;border-top-right-radius: 70px">
            <div class="container pt-15 pb-20" style="max-width: 1610px;">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0" data-wow-delay="0">
                            <div class="logo mb-30">
                                <a href='{{url("/")}}' class='mb-15'>
                                    <img  class="p-3" src="{{ \App\Models\Option::logo() }}" alt="{{ \App\Models\Option::get('site_title') }}" width="50%">
                                </a>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="{{asset('assets/imgs/theme/icons/icon-location.svg')}}" alt=""><strong>Address: </strong> <span class="mx-1">Al metawaren area Sadat City, Monufia Governorate, Egypt</span></li>
                                <li><img src="{{asset('assets/imgs/theme/icons/icon-contact.svg')}}" alt=""><strong>Call Us:</strong><span class="mx-1"><a href="tel:{{ \App\Models\Option::get('phone') }}">{{ \App\Models\Option::get('phone') }}</a></span></li>
                                <li><img src="{{asset('assets/imgs/theme/icons/icon-email-2.svg')}}" alt=""><strong>Email:</strong><span class="mx-1"><a href="mailto:{{ \App\Models\Option::get('email') }}">{{ \App\Models\Option::get('email') }}</a></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col" data-wow-delay=".2s">
                        <h4 class="widget-title">Popular Links</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="{{ \App\Models\Post::find(1)->url() }}">Home</a></li>
                            <li><a href="{{ \App\Models\Post::find(2)->url() }}">About</a></li>
                            <li><a href="{{ \App\Models\Post::find(3)->url() }}">Products</a></li>
                            <li><a href="{{ \App\Models\Post::find(4)->url() }}">Blog</a></li>
                            <li><a href="{{ \App\Models\Post::find(5)->url() }}">Faqs</a></li>
                            <li><a href="{{ \App\Models\Post::find(6)->url() }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col" data-wow-delay=".3s">
                        <h4 class="widget-title">Brands</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            @foreach(App\Models\Term::where('taxonomy','product_brand')->get() as $term)
                            <li><a href="{{$term->url()}}">{{$term->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="footer-link-widget col" data-wow-delay=".4s">
                        <h4 class="widget-title">Follow Us</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0 mobile-social-icon d-block">
                            <li>
                                <div class="d-flex">
                                    <a class="ft-sl-facebook ft-sl-generic me-3" rel="noopener" title="Facebook" href="https://www.facebook.com/siamocean22" target="_blank">
                                        <img src="{{asset('assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="">
                                    </a> 
                                    <a href="https://www.facebook.com/siamocean22" target="_blank" class="mt-1" style="font-size: 18px;background:unset">@siamocean22</a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <a class="ft-sl-facebook ft-sl-generic me-3" rel="noopener" title="Linkedin" href="https://www.linkedin.com/company/siam-ocean-for-food-industries/" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-linkedin" viewBox="0 0 16 16">
                                          <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                                        </svg>
                                    </a> 
                                    <a href="https://www.linkedin.com/company/siam-ocean-for-food-industries/" target="_blank" class="mt-1" style="font-size: 18px;background:unset">SiamOcean</a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex">
                                    <a class="ft-sl-facebook ft-sl-generic me-3" rel="noopener" title="Whatsapp" href="https://api.whatsapp.com/send?phone=201116551266" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                          <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                                        </svg>
                                    </a> 
                                    <a href="tel:{{ \App\Models\Option::get('phone') }}" target="_blank" class="mt-1" style="font-size: 16px;background:unset">{{ \App\Models\Option::get('phone') }}</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{asset('assets/imgs/theme/loading.gif')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/counterup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{asset('assets/js/plugins/isotope.js')}}"></script>
    <script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
    <!-- Template  JS -->
    <script src="{{asset('assets/js/main.js?v=6.0')}}"></script>
    <script src="{{asset('assets/js/shop.js?v=6.0')}}"></script>
    <script>
        // function Captcha() {
        //     var r, a = new Array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
        //         "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m",
        //         "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6", "7",
        //         "8", "9");
        //     for (r = 0; r < 6; r++) var e = a[Math.floor(Math.random() * a.length)],
        //         t = a[Math.floor(Math.random() * a.length)],
        //         o = a[Math.floor(Math.random() * a.length)],
        //         n = a[Math.floor(Math.random() * a.length)];
        //     return (e + t + o + n).replace(" ", "")
        // }

        // function ValidCaptcha() {
        //     return removeSpaces(document.getElementById("mainCaptcha").value) == removeSpaces(document.getElementById(
        //         "txtInput").value)
        // }

        // function removeSpaces(r) {
        //     return r.split(" ").join("")
        // }
        // $("form#form_send").each((function() {
        //     $(this).submit((function(r) {
        //         r.preventDefault(), form = $(this), form_url = $(this).attr("action"), form.find(
        //                 ".contact-form-response-wrapper").empty(), form.find(
        //                 ".contact-form-response-wrapper").append(
        //                 '<div style="width: 3rem; height: 3rem;"><svg width="60" height="60" viewBox="0 0 512 512" style="color:#00aaa6" xmlns="http://www.w3.org/2000/svg" class="h-full w-full"><rect width="512" height="512" x="0" y="0" rx="30" fill="transparent" stroke="transparent" stroke-width="0" stroke-opacity="100%" paint-order="stroke"></rect><svg width="256px" height="256px" viewBox="0 0 24 24" fill="currentColor" x="128" y="128" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path fill="currentColor" d="M12,4a8,8,0,0,1,7.89,6.7A1.53,1.53,0,0,0,21.38,12h0a1.5,1.5,0,0,0,1.48-1.75,11,11,0,0,0-21.72,0A1.5,1.5,0,0,0,2.62,12h0a1.53,1.53,0,0,0,1.49-1.3A8,8,0,0,1,12,4Z"><animateTransform attributeName="transform" dur="0.75s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></g></svg></svg></div>'), form_data = form
        //             .serialize(), form_array = form.serializeArray(), grecaptcha.ready((function() {
        //                 grecaptcha.execute("6Lc224IcAAAAADVF04lonKLHcSBbaEYiMryFAttP", {
        //                     action: "submit"
        //                 }).then((function(r) {
        //                     form_array.push({
        //                         name: "recaptcha",
        //                         value: r
        //                     }), console.log(form_array), $.ajax({
        //                         type: "POST",
        //                         url: form_url,
        //                         data: form_array,
        //                         success: function() {
								// 	form.find(".contact-form-response-wrapper").empty(),
								// 	form.find(".contact-form-response-wrapper").append('<div class="alert alert-primary" style="text-align:center" role="alert">Successfully Send Message</div>')
        //                         }
        //                     })
        //                 }))
        //             }))
        //     }))
        // }));
        $("form#form_send").each(function() {
            $(this).submit(function(e) {
                e.preventDefault();
        
                var form = $(this);
                var form_url = form.attr("action");
                var form_data = form.serialize();
                var form_array = form.serializeArray();
        
                var responseWrapper = form.find(".contact-form-response-wrapper");
                responseWrapper.empty();
                responseWrapper.append(
                    '<div style="width: 3rem; height: 3rem;">' +
                        '<svg width="60" height="60" viewBox="0 0 512 512" style="color:#00aaa6" xmlns="http://www.w3.org/2000/svg" class="h-full w-full">' +
                            '<rect width="512" height="512" x="0" y="0" rx="30" fill="transparent" stroke="transparent" stroke-width="0" stroke-opacity="100%" paint-order="stroke"></rect>' +
                            '<svg width="256px" height="256px" viewBox="0 0 24 24" fill="currentColor" x="128" y="128" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg">' +
                                '<g fill="currentColor">' +
                                    '<path fill="currentColor" d="M12,4a8,8,0,0,1,7.89,6.7A1.53,1.53,0,0,0,21.38,12h0a1.5,1.5,0,0,0,1.48-1.75,11,11,0,0,0-21.72,0A1.5,1.5,0,0,0,2.62,12h0a1.53,1.53,0,0,0,1.49-1.3A8,8,0,0,1,12,4Z">' +
                                        '<animateTransform attributeName="transform" dur="0.75s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/>' +
                                    '</path>' +
                                '</g>' +
                            '</svg>' +
                        '</svg>' +
                    '</div>'
                );
        
                $.ajax({
                    type: "POST",
                    url: form_url,
                    data: form_array,
                    success: function() {
                        responseWrapper.empty();
                        responseWrapper.append('<div class="alert alert-primary" style="text-align:center" role="alert">Successfully Sent Message</div>');
                    }
                });
            });
        });

    </script>
	{{--<script src="https://www.google.com/recaptcha/api.js?render=6Lc224IcAAAAADVF04lonKLHcSBbaEYiMryFAttP"></script>--}}
</body>

</html>