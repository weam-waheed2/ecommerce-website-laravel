<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('dashboard/images/logos/favicon.png')); ?>">

    <!-- Core Css -->
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/styles.css')); ?>">

    <title>Modernize Bootstrap Admin</title>
</head>

<body>
    <div id="main-wrapper">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
            <div class="position-relative z-index-5">
                <div class="row">
                    <div class="col-xl-7 col-xxl-8">
                        <div class="d-none d-xl-flex align-items-center justify-content-center"
                            style="height: calc(100vh - 80px);">
                            <img src="<?php echo e(asset('dashboard/images/backgrounds/login-security.svg')); ?>" alt=""
                                class="img-fluid" width="500">
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-4">
                        <div
                            class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                            <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                                <h2 class="mb-1 fs-7 fw-bolder text-center">Welcome to Siam Ocean</h2>
                                <p class="mb-7 text-center">Your Admin Dashboard</p>
                                <div class="position-relative text-center my-4">
                                    <p
                                        class="mb-0 fs-4 px-3 d-inline-block bg-body text-dark z-index-5 position-relative">
                                        sign
                                        in
                                        with</p>
                                    <span
                                        class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                </div>
                                <form method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3" style="text-align: end;">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="email">
                                    </div>
                                    <div class="mb-4" style="text-align: end;">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->

    <script src="<?php echo e(asset('dashboard/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/app.rtl.init.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/libs/simplebar/dist/simplebar.min.js')); ?>"></script>

    <script src="<?php echo e(asset('dashboard/js/sidebarmenu.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/theme.js')); ?>"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\siam_ocean_app\resources\views/auth/login.blade.php ENDPATH**/ ?>