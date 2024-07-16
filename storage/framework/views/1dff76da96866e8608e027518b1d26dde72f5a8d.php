<!DOCTYPE html>
<html lang="en" dir="rtl" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('dashboard/images/logos/favicon.png')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Core Css -->
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/styles.css')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">
    <title>
        <?php echo $__env->yieldContent('title','Siam Ocean - Dashboard'); ?>
    </title>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/libs/owl.carousel/dist/assets/owl.carousel.min.css')); ?>">
    <style>
        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 60vh;
        }
        .ck-content .image {
            /* Block images */
            max-width: 100%;
            margin: 20px auto;
        }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script src="<?php echo e(asset('dashboard/libs/jquery/dist/jquery.min.js')); ?>"></script>
    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
</head>

<body>
    <?php echo $__env->make('admin.media.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.media.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div><!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div class="brand-logo d-flex align-items-center justify-content-between pt-2">
                    <a href="<?php echo e(url('/')); ?>" class="text-nowrap logo-img">
                        <img src="<?php echo e(asset('assets/imgs/theme/siam-logo.png')); ?>" class="dark-logo" alt="Logo-Dark" style="width: 60%;margin: auto;">
                    </a>
                    <a href="javascript:void(0)"
                        class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                        </svg>
                    </a>
                </div>

                <nav class="sidebar-nav scroll-sidebar pt-4" data-simplebar>
                    <ul id="sidebarnav">
                    
                    <?php if(config('sidebar')): ?>
                        <?php $__currentLoopData = config('sidebar'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($sidebar['items']) && !empty($sidebar['items'])): ?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow <?php echo e(request()->is($sidebar['url']) ? 'active' : ''); ?>" href="javascript:void(0)" aria-expanded="false">
                                        <span class="d-flex">
                                            <?php echo $sidebar['icon']; ?>

                                        </span>
                                        <span class="hide-menu"><?php echo e($sidebar['name']); ?></span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        <?php $__currentLoopData = $sidebar['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="sidebar-item">
                                            <a href="<?php echo e(url($child['url'])); ?>" class="sidebar-link <?php echo e(request()->is($child['url']) ? 'active' : ''); ?>">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu"><?php echo e($child['name']); ?></span>
                                            </a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($sidebar['terms'])): ?>
                                            <?php $__currentLoopData = $sidebar['terms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="sidebar-item">
                                                    <a href="<?php echo e(url('admin/terms/' . $sub['taxonomy'])); ?>" class="sidebar-link <?php echo e(request()->is($sub['taxonomy']) ? 'active' : ''); ?>">
                                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                                            <i class="ti ti-circle"></i>
                                                        </div>
                                                        <span class="hide-menu"><?php echo e($sub['name']); ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="sidebar-item">
                                    <a class="sidebar-link <?php echo e(request()->is($sidebar['url']) ? 'active' : ''); ?>" href="<?php echo e(url($sidebar['url'])); ?>" aria-expanded="false">
                                        <span>
                                            <?php echo $sidebar['icon']; ?>

                                        </span>
                                        <span class="hide-menu"><?php echo e($sidebar['name']); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </ul>
                </nav>

                <div class="fixed-profile p-3 mx-3 mb-2 bg-secondary-subtle rounded mt-3">
                    <div class="hstack gap-3">
                        <div class="john-img">
                            <img src="<?php echo e(asset('dashboard/images/profile/user-1.jpg')); ?>" class="rounded-circle" width="40"
                                height="40" alt>
                        </div>
                        <div class="john-title">
                            <h6 class="mb-0 fs-4 fw-semibold"><?php echo e(Auth::user()->name); ?></h6>
                            <span class="fs-2"><?php echo e(Auth::user()->email); ?></span>
                        </div>
                        <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                            aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-title="logout">
                            <i class="ti ti-power fs-6"></i>
                        </button>
                    </div>
                </div>

                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
            </div>
        </aside>
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <div class="with-vertical"><!-- ---------------------------------- -->
                    <!-- Start Vertical Layout Header -->
                    <!-- ---------------------------------- -->
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item d-xl-none d-block">
                                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                                    href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-justify" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>

                        <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)"
                            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                                <i class="ti ti-dots fs-7"></i>
                            </span>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0)"
                                    class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                    aria-controls="offcanvasWithBothOptions">
                                    <i class="ti ti-align-justified fs-7"></i>
                                </a>
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <!-- ------------------------------- -->
                                    <!-- start language Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link nav-icon-hover" href="javascript:void(0)"
                                            id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="<?php echo e(asset('dashboard/images/svgs/icon-flag-en.svg')); ?>" alt width="20px"
                                                height="20px" class="rounded-circle object-fit-cover round-20">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="message-body">
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="<?php echo e(asset('dashboard/images/svgs/icon-flag-en.svg')); ?>" alt
                                                            width="20px" height="20px"
                                                            class="rounded-circle object-fit-cover round-20">
                                                    </div>
                                                    <p class="mb-0 fs-3">English (UK)</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="<?php echo e(asset('dashboard/images/svgs/icon-flag-fr.svg')); ?>" alt
                                                            width="20px" height="20px"
                                                            class="rounded-circle object-fit-cover round-20">
                                                    </div>
                                                    <p class="mb-0 fs-3">français (French)</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="<?php echo e(asset('dashboard/images/svgs/icon-flag-sa.svg')); ?>" alt
                                                            width="20px" height="20px"
                                                            class="rounded-circle object-fit-cover round-20">
                                                    </div>
                                                    <p class="mb-0 fs-3">عربي (Arabic)</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end language Dropdown -->
                                    <!-- ------------------------------- -->

                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="<?php echo e(asset('dashboard/images/profile/user-1.jpg')); ?>"
                                                        class="rounded-circle" width="35" height="35" alt>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="<?php echo e(asset('dashboard/images/profile/user-1.jpg')); ?>"
                                                        class="rounded-circle" width="80" height="80" alt>
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3"><?php echo e(Auth::user()->name); ?></h5>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i>
                                                            <?php echo e(Auth::user()->email); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="d-grid py-4 px-7 pt-8">
                                                    <a href="<?php echo e(url('logout')); ?>"
                                                        class="btn btn-outline-primary">Log Out</a>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- ---------------------------------- -->
                    <!-- End Vertical Layout Header -->
                    <!-- ---------------------------------- -->

                    <!-- ------------------------------- -->
                    <!-- apps Dropdown in Small screen -->
                    <!-- ------------------------------- -->
                    <!--  Mobilenavbar -->
                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
                        id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
                        <nav class="sidebar-nav scroll-sidebar">
                            <div class="offcanvas-header justify-content-between">
                                <img src="<?php echo e(asset('dashboard/images/logos/favicon.ico')); ?>" alt class="img-fluid">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                        </nav>
                    </div>

                </div>
                <div class="app-header with-horizontal">
                    <nav class="navbar navbar-expand-xl container-fluid p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item d-block d-xl-none">
                                <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse"
                                    href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                            <li class="nav-item d-none d-xl-block">
                                <a href="index.html" class="text-nowrap nav-link">
                                    <img src="<?php echo e(asset('assets/imgs/theme/siam-logo.png')); ?>" class="dark-logo"
                                        width="180" alt>
                                    <img src="<?php echo e(asset('assets/imgs/theme/siam-logo.png')); ?>" class="light-logo"
                                        width="180" alt>
                                </a>
                            </li>
                            
                        </ul>
                    
                        <div class="d-block d-xl-none">
                            <a href="<?php echo e(url('/')); ?>" class="text-nowrap nav-link">
                                <img src="<?php echo e(asset('assets/imgs/theme/siam-logo.png')); ?>" width="180" alt>
                            </a>
                        </div>
                        <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)"
                            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                                <i class="ti ti-dots fs-7"></i>
                            </span>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                                <a href="javascript:void(0)"
                                    class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                    aria-controls="offcanvasWithBothOptions">
                                    <i class="ti ti-align-justified fs-7"></i>
                                </a>
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <!-- ------------------------------- -->
                                    <!-- start language Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link nav-icon-hover" href="javascript:void(0)"
                                            id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="<?php echo e(asset('dashboard/images/svgs/icon-flag-en.svg')); ?>" alt width="20px"
                                                height="20px" class="rounded-circle object-fit-cover round-20">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="message-body">
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="<?php echo e(asset('dashboard/images/svgs/icon-flag-en.svg')); ?>" alt
                                                            width="20px" height="20px"
                                                            class="rounded-circle object-fit-cover round-20">
                                                    </div>
                                                    <p class="mb-0 fs-3">English (UK)</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="<?php echo e(asset('dashboard/images/svgs/icon-flag-fr.svg')); ?>" alt
                                                            width="20px" height="20px"
                                                            class="rounded-circle object-fit-cover round-20">
                                                    </div>
                                                    <p class="mb-0 fs-3">français (French)</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="<?php echo e(asset('dashboard/images/svgs/icon-flag-sa.svg')); ?>" alt
                                                            width="20px" height="20px"
                                                            class="rounded-circle object-fit-cover round-20">
                                                    </div>
                                                    <p class="mb-0 fs-3">عربي (Arabic)</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end language Dropdown -->
                                    <!-- ------------------------------- -->

                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="<?php echo e(asset('dashboard/images/profile/user-1.jpg')); ?>"
                                                        class="rounded-circle" width="35" height="35" alt>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="<?php echo e(asset('dashboard/images/profile/user-1.jpg')); ?>"
                                                        class="rounded-circle" width="80" height="80" alt>
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3"><?php echo e(Auth::user()->name); ?></h5>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i>
                                                            <?php echo e(Auth::user()->email); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="d-grid py-4 px-7 pt-8">
                                                    <a href="<?php echo e(url('logout')); ?>"
                                                        class="btn btn-outline-primary">Log Out</a>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
            </header>
            <!--  Header End -->

            <div class="body-wrapper">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="gx_media_manager_modal" tabindex="-1" aria-hidden="true">

<div class="modal-dialog modal-dialog-centered modal-fullscreen p-6">

    <div class="modal-content">
        <div class="modal-header">

            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6" type="button" id="gx_media_manager_search_click" style="right: 6px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" class="form-control form-control-solid w-250px pe-15" placeholder="Search Media" id="gx_media_manager_search_text_input" />
            </div>
            <!--end::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <div>
                    <input type="file" class="d-none" id="gx_media_manager_file_upload_input" multiple="">
                    <button type="button" class="btn btn-primary" onclick="$('#gx_media_manager_file_upload_input').click();">
                        <!--begin::Svg Icon | path: icons/duotune/files/fil018.svg-->
                        <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor" />
                            <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z" fill="currentColor" />
                            <path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z" fill="currentColor" />
                        </svg>
                    </span>
                        Upload Files</button>

                </div>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>


        </div>

        <div class="modal-body scroll-y">
            <div class="row">
                <div class="bg-success rounded h-8px d-none" role="progressbar" id="gx_media_manager_progressbar_bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="d-flex flex-wrap" id="gx_media_manager_main_content"></div>
                </div>
                <div class="col-lg-3">
                    <div class="row" id="gx_media_manager_meta_content">
                        <div class="col-12">
                            <div class="text-center">
                                <img alt="Pic" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" id="gx_media_manager_meta_content_img" class="mx-auto" style="width: 210px; height: 210px; border-radius: 2px; border: 1px dashed #b9b9b9;">
                                <div class="d-flex flex-column mt-3">
                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mt-3 text-start" id="gx_media_manager_meta_content_img_title"></a>
                                    <span id="gx_media_manager_meta_width_height" class="mt-3 text-start"></span>
                                    <a href="javascript:void(0)" class="text-danger mt-3 text-start" id="gx_media_manager_meta_content_img_delete_click">Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="w-100">
                                    <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" id="gx_media_manager_id_input" disabled style="height: 30px;font-size: 12px;font-weight: 400;width: 100px;"></td>
                                        <td>
                                            <div class="position-relative my-1">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                                <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4" id="gx_media_manager_url_copy_click" type="button" style="right: 10px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                <!--end::Svg Icon-->
                                                <input type="text" data-kt-table-widget-4="search" class="form-control" id="gx_media_manager_url_input" disabled style="height: 30px;font-size: 12px;font-weight: 400;padding-right: 33px;" />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Image Alt</td>
                                        <td>
                                            <input type="hidden" id="gx_media_manager_meta_content_ID_input">
                                            <input type="text" class="form-control col-lg-8" id="gx_media_manager_meta_content_alt_input" style="height: 30px;font-size: 12px;font-weight: 400;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Caption</td>
                                        <td>
                                            <input type="text" class="form-control" id="gx_media_manager_meta_content_caption_input" style="height: 30px;font-size: 12px;font-weight: 400;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>
                                            <input type="text" class="form-control" id="gx_media_manager_meta_content_description_input" style="height: 30px;font-size: 12px;font-weight: 400;">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="gx_media_manager_insert_click">Insert</button>
        </div>
    </div>
</div>
</div>

    <script src="<?php echo e(asset('dashboard/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/app.rtl.init.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/libs/simplebar/dist/simplebar.min.js')); ?>"></script>

    <script src="<?php echo e(asset('dashboard/js/sidebarmenu.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/theme.js')); ?>"></script>

    <script src="<?php echo e(asset('dashboard/libs/owl.carousel/dist/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/libs/apexcharts/dist/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/dashboards/dashboard.js')); ?>"></script>

    <?php echo $__env->yieldContent('javascript'); ?>
</body>

</html>
<?php /**PATH /www/wwwroot/siamocean.zendle.net/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>