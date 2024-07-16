<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title','Home - Siam Ocean'); ?></title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php echo $__env->yieldContent('seo'); ?>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/imgs/theme/favicon.svg')); ?>">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/main.css?v=6.0')); ?>">
    <script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/nouislider/nouislider.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/nouislider/nouislider.css')); ?>"/>

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Rubik:ital,wght@0,300..900;1,300..900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
        
</head>

<body>

    <header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <span>Siam Ocean for Food Industries</span>
        </div>
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-4">
                        <div>
                            Welcome To Siam Ocean
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="header-info header-info-right text-center">
                            <ul>
                                <li>Need help ? Call Us : <strong class="mx-2"> + 1800 900</strong></li>
                                <li>
                                    <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></a>
                                    <ul class="language-dropdown">
                                        <li>
                                            <a href="#" class="language-dropdown-active"><img src="<?php echo e(asset('assets/imgs/theme/flag-ar.png')); ?>" alt="">English </i></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="<?php echo e(asset('assets/imgs/theme/flag-en.png')); ?>" alt="">Arabic</a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="<?php echo e(asset('assets/imgs/theme/flag-fr.png')); ?>" alt="">Français</a>
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
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href='<?php echo e(url("/")); ?>'>
                            <img  class="p-3" src="<?php echo e(\App\Models\Option::logo()); ?>" alt="<?php echo e(\App\Models\Option::get('site_title')); ?>">
                        </a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="logo logo-width-1">
                            <a href='<?php echo e(url("/")); ?>'>
                                <img  class="p-3" src="<?php echo e(\App\Models\Option::logo()); ?>" alt="<?php echo e(\App\Models\Option::get('site_title')); ?>">
                            </a>
                        </div>
                        <div class="main-categori-wrap d-none d-lg-block">
                            
                            <a class="categories-button-active" href="#">
                                <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                <div class="row">
                                    <?php $__currentLoopData = App\Models\Term::where('taxonomy','product_category')->whereBetween('ID', [1, 6])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6">
                                        <div class="categories-dropdown-wrap">
                                            <a href='<?php echo e($term->url()); ?>'> <img src="<?php echo e(asset('assets/imgs/theme/icons/category-2.svg')); ?>" alt=""><?php echo e($term->name); ?></a>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="more_slide_open" style="display: none">
                                    <div class="row">
                                        <?php $__currentLoopData = App\Models\Term::where('taxonomy','product_category')->whereBetween('ID', [7, 11])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-6">
                                            <div class="categories-dropdown-wrap">
                                                <a href='<?php echo e($term->url()); ?>'> <img src="<?php echo e(asset('assets/imgs/theme/icons/category-2.svg')); ?>" alt=""><?php echo e($term->name); ?></a>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="more_categories bg-light py-2"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    <li>
                                        <a href='<?php echo e(\App\Models\Post::find(1)->url()); ?>' class='<?php echo e(request()->is('/') ? 'active' : ''); ?> '>Home</a>
                                    </li>
                                    <li>
                                        <a href='<?php echo e(\App\Models\Post::find(2)->url()); ?>' class="<?php echo e(request()->is('about') ? 'active' : ''); ?> ">About</a>
                                    </li>
                                    <li>
                                        <a href='<?php echo e(\App\Models\Post::find(3)->url()); ?>' class="<?php echo e(request()->is('products') ? 'active' : ''); ?> ">Products</a>
                                    </li>
                                    <li>
                                        <a href='<?php echo e(\App\Models\Post::find(4)->url()); ?>' class="<?php echo e(request()->is('blog') ? 'active' : ''); ?> ">Blog</a>
                                    </li>
                                    <li>
                                        <a href='<?php echo e(\App\Models\Post::find(5)->url()); ?>' class="<?php echo e(request()->is('faq') ? 'active' : ''); ?> ">Faqs</a>
                                    </li>
                                    <li>
                                        <a href='<?php echo e(\App\Models\Post::find(6)->url()); ?>' class="<?php echo e(request()->is('contact') ? 'active' : ''); ?> ">Contact Us</a>
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
                    <a href='<?php echo e(url("/")); ?>'>
                        <img  class="p-3" src="<?php echo e(\App\Models\Option::logo()); ?>" alt="<?php echo e(\App\Models\Option::get('site_title')); ?>">
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
                                <a href='<?php echo e(\App\Models\Post::find(1)->url()); ?>' class='active'>Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='<?php echo e(\App\Models\Post::find(2)->url()); ?>'>About</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='<?php echo e(\App\Models\Post::find(3)->url()); ?>'>Products</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='<?php echo e(\App\Models\Post::find(4)->url()); ?>'>Blog</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='<?php echo e(\App\Models\Post::find(5)->url()); ?>'>Faqs</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href='<?php echo e(\App\Models\Post::find(6)->url()); ?>'>Contact Us</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">Arabic</a></li>
                                    <li><a href="#">Français</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i><?php echo e(\App\Models\Option::get('phone')); ?> </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <?php if(is_array($social = json_decode(\App\Models\Option::get('social'),1))): ?>
                        <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($val)): ?>
                                <a class="ft-sl-facebook ft-sl-generic me-3" rel="noopener" title="<?php echo e($key); ?>" href="<?php echo e($val); ?>" target="_blank"><img src="<?php echo e(asset('assets/imgs/theme/icons/icon-facebook-white.svg')); ?>" alt=""></a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <main class="main">
        <?php echo $__env->yieldContent('content'); ?>
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
                                <a href="<?php echo e(\App\Models\Post::find(6)->url()); ?>" class="btn" type="submit">Send Message</a>
                            </div>
                            <img src="<?php echo e(asset('assets/imgs/banner/banner-5.png')); ?>" alt="newsletter">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured section-padding">
            <div class="container" style="max-width: 1610px;">
                <div class="row">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0 d-grid my-2">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay="0">
                            <div class="banner-icon">
                                <img src="<?php echo e(asset('assets/imgs/theme/icons/icon-1.svg')); ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Uncompromising Quality</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-grid my-2">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="banner-icon">
                                <img src="<?php echo e(asset('assets/imgs/theme/icons/icon-2.svg')); ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Exceptional Customer Service</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-grid my-2">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="banner-icon">
                                <img src="<?php echo e(asset('assets/imgs/theme/icons/icon-4.svg')); ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Community Engagement</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-grid my-2">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <div class="banner-icon">
                                <img src="<?php echo e(asset('assets/imgs/theme/icons/icon-5.svg')); ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Expertise in Food Industry</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-grid my-2">
                        <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                            <div class="banner-icon">
                                <img src="<?php echo e(asset('assets/imgs/theme/icons/icon-6.svg')); ?>" alt="">
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Sustainable Practices</h3>
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
                                <a href='<?php echo e(url("/")); ?>' class='mb-15'>
                                    <img  class="p-3" src="<?php echo e(\App\Models\Option::logo()); ?>" alt="<?php echo e(\App\Models\Option::get('site_title')); ?>" width="50%">
                                </a>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="<?php echo e(asset('assets/imgs/theme/icons/icon-location.svg')); ?>" alt=""><strong>Address: </strong> <span class="mx-1">Al metawaren area Sadat City, Monufia Governorate, Egypt</span></li>
                                <li><img src="<?php echo e(asset('assets/imgs/theme/icons/icon-contact.svg')); ?>" alt=""><strong>Call Us:</strong><span class="mx-1"><a href="tel:<?php echo e(\App\Models\Option::get('phone')); ?>"><?php echo e(\App\Models\Option::get('phone')); ?></a></span></li>
                                <li><img src="<?php echo e(asset('assets/imgs/theme/icons/icon-email-2.svg')); ?>" alt=""><strong>Email:</strong><span class="mx-1"><a href="mailto:<?php echo e(\App\Models\Option::get('email')); ?>"><?php echo e(\App\Models\Option::get('email')); ?></a></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col" data-wow-delay=".2s">
                        <h4 class="widget-title">Popular Links</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="<?php echo e(\App\Models\Post::find(1)->url()); ?>">Home</a></li>
                            <li><a href="<?php echo e(\App\Models\Post::find(2)->url()); ?>">About</a></li>
                            <li><a href="<?php echo e(\App\Models\Post::find(3)->url()); ?>">Products</a></li>
                            <li><a href="<?php echo e(\App\Models\Post::find(4)->url()); ?>">Blog</a></li>
                            <li><a href="<?php echo e(\App\Models\Post::find(5)->url()); ?>">Faqs</a></li>
                            <li><a href="<?php echo e(\App\Models\Post::find(6)->url()); ?>">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col" data-wow-delay=".3s">
                        <h4 class="widget-title">Brands</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <?php $__currentLoopData = App\Models\Term::where('taxonomy','product_brand')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e($term->url()); ?>"><?php echo e($term->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="footer-link-widget col" data-wow-delay=".4s">
                        <h4 class="widget-title">Best Categories</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <?php $__currentLoopData = App\Models\Term::where('taxonomy','product_category')->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e($term->url()); ?>"><?php echo e($term->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
        </div></section>
        <div class="container pb-30" data-wow-delay="0" style="max-width: 1610px;">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy; <?php echo e(Carbon\Carbon::now()->year); ?> - <strong class="text-brand"><?php echo e(\App\Models\Option::get('site_title')); ?></strong> <br>All rights reserved</p>
                </div>
                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                    <div class="hotline d-lg-inline-flex mr-30">
                        <img src="<?php echo e(asset('assets/imgs/theme/icons/phone-call.svg')); ?>" alt="hotline">
                        <p><?php echo e(\App\Models\Option::get('phone')); ?></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Follow Us</h6>
                        <?php if(is_array($social = json_decode(\App\Models\Option::get('social'),1))): ?>
                            <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($val)): ?>
                                    <a class="ft-sl-facebook ft-sl-generic me-3" rel="noopener" title="<?php echo e($key); ?>" href="<?php echo e($val); ?>" target="_blank"><img src="<?php echo e(asset('assets/imgs/theme/icons/icon-facebook-white.svg')); ?>" alt=""></a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="<?php echo e(asset('assets/imgs/theme/loading.gif')); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="<?php echo e(asset('assets/js/vendor/modernizr-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/vendor/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/slick.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.syotimer.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/wow.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/counterup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.countdown.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/images-loaded.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/isotope.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/scrollup.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.vticker-min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.theia.sticky.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/jquery.elevatezoom.js')); ?>"></script>
    <!-- Template  JS -->
    <script src="<?php echo e(asset('assets/js/main.js?v=6.0')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/shop.js?v=6.0')); ?>"></script>
    <script>
        function Captcha() {
            var r, a = new Array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
                "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m",
                "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6", "7",
                "8", "9");
            for (r = 0; r < 6; r++) var e = a[Math.floor(Math.random() * a.length)],
                t = a[Math.floor(Math.random() * a.length)],
                o = a[Math.floor(Math.random() * a.length)],
                n = a[Math.floor(Math.random() * a.length)];
            return (e + t + o + n).replace(" ", "")
        }

        function ValidCaptcha() {
            return removeSpaces(document.getElementById("mainCaptcha").value) == removeSpaces(document.getElementById(
                "txtInput").value)
        }

        function removeSpaces(r) {
            return r.split(" ").join("")
        }
        $("form#form_send").each((function() {
            $(this).submit((function(r) {
                r.preventDefault(), form = $(this), form_url = $(this).attr("action"), form.find(
                        ".contact-form-response-wrapper").empty(), form.find(
                        ".contact-form-response-wrapper").append(
                        '<div style="width: 3rem; height: 3rem;"><svg width="60" height="60" viewBox="0 0 512 512" style="color:#00aaa6" xmlns="http://www.w3.org/2000/svg" class="h-full w-full"><rect width="512" height="512" x="0" y="0" rx="30" fill="transparent" stroke="transparent" stroke-width="0" stroke-opacity="100%" paint-order="stroke"></rect><svg width="256px" height="256px" viewBox="0 0 24 24" fill="currentColor" x="128" y="128" role="img" style="display:inline-block;vertical-align:middle" xmlns="http://www.w3.org/2000/svg"><g fill="currentColor"><path fill="currentColor" d="M12,4a8,8,0,0,1,7.89,6.7A1.53,1.53,0,0,0,21.38,12h0a1.5,1.5,0,0,0,1.48-1.75,11,11,0,0,0-21.72,0A1.5,1.5,0,0,0,2.62,12h0a1.53,1.53,0,0,0,1.49-1.3A8,8,0,0,1,12,4Z"><animateTransform attributeName="transform" dur="0.75s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></g></svg></svg></div>'), form_data = form
                    .serialize(), form_array = form.serializeArray(), grecaptcha.ready((function() {
                        grecaptcha.execute("6Lc224IcAAAAADVF04lonKLHcSBbaEYiMryFAttP", {
                            action: "submit"
                        }).then((function(r) {
                            form_array.push({
                                name: "recaptcha",
                                value: r
                            }), console.log(form_array), $.ajax({
                                type: "POST",
                                url: form_url,
                                data: form_array,
                                success: function() {
									form.find(".contact-form-response-wrapper").empty(),
									form.find(".contact-form-response-wrapper").append('<div class="alert alert-primary" style="text-align:center" role="alert">Successfully Send Message</div>')
                                }
                            })
                        }))
                    }))
            }))
        }));
    </script>
	<script src="https://www.google.com/recaptcha/api.js?render=6Lc224IcAAAAADVF04lonKLHcSBbaEYiMryFAttP"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/layouts/master.blade.php ENDPATH**/ ?>