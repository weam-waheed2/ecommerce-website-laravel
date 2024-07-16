
<!DOCTYPE html>
<html lang="en" dir="rtl" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('dashboard/images/logos/favicon.png') }}">

    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <title>
        Page Not Found | 404
    </title>
    
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{ asset('dashboard/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
</head>

<body>
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="position-relative overflow-hidden min-vh-50 w-100 d-flex align-items-center justify-content-center">
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="row justify-content-center w-100">
                        <div class="col-lg-4">
                            <div class="text-center">
                                <img src="{{asset('dashboard/images/backgrounds/errorimg.svg')}}" alt="" class="img-fluid" width="500">
                                <h1 class="fw-semibold mb-7 fs-9">Opps!!!</h1>
                                <h4 class="fw-semibold mb-7">This page you are looking for could not be found</h4>
                                <a class="btn btn-primary" href="{{url('/')}}" role="button">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/app.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/app.rtl.init.js') }}"></script>
    <script src="{{ asset('dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <script src="{{ asset('dashboard/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dashboard/js/theme.js') }}"></script>

    <script src="{{ asset('dashboard/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dashboard/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/dashboards/dashboard.js') }}"></script>
</body>

</html>
