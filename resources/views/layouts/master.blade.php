
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Examin - Education and LMS Template">

    <!-- ========== Page Title ========== -->
    <link rel="icon" href="/perpus/logo.png" type="image/x-icon">
    <title>SI - Perpustakaan</title>

    <!-- ========== Start Stylesheet ========== -->
    <link href="/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/elegant-icons.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/animate.css" rel="stylesheet" />
    <link href="/dashboard/assets/css/bootsnav.css" rel="stylesheet" />
    <link href="/dashboard/style.css" rel="stylesheet">
    <link href="/dashboard/assets/css/responsive.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Header
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default navbar-sticky bootsnav">

            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="/perpus/logo.png" class="logo" alt="Logo" width="60" height="60">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                            <a href="/">Home</a>
                        </li>
                        <li class="{{ (request()->is('buku*')) ? 'active' : '' }}">
                            <a href="{{ route('home.buku') }}">Buku</a>
                        </li>
                        <li class="{{ (request()->is('tata-tertib')) ? 'active' : '' }}">
                            <a href="{{ route('home.tata') }}">Tata Tertib</a>
                        </li>
                        <li class="{{ (request()->is('profile')) ? 'active' : '' }}">
                            <a href="{{ route('home.profile') }}">Profile</a>
                        </li>
                        <li class="{{ (request()->is('visi')) ? 'active' : '' }}">
                            <a href="{{ route('home.visi') }}">Visi Misi</a>
                        </li>
                        <li class="search"><a href="#">|</a></li>
                        @auth
                        <li class="side-menu"><a href="{{ url('/home') }}"><i class="fa fa-user"></i></a></li>
                        @else
                        <li class="side-menu"><a href="{{ route('login') }}"><i class="fa fa-user"></i></a></li>
                        @endauth

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    <!-- Start Banner
    ============================================= -->

    @yield('content')

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="/dashboard/assets/js/jquery-1.12.4.min.js"></script>
    <script src="/dashboard/assets/js/bootstrap.min.js"></script>
    <script src="/dashboard/assets/js/equal-height.min.js"></script>
    <script src="/dashboard/assets/js/jquery.appear.js"></script>
    <script src="/dashboard/assets/js/jquery.easing.min.js"></script>
    <script src="/dashboard/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/dashboard/assets/js/modernizr.custom.13711.js"></script>
    <script src="/dashboard/assets/js/owl.carousel.min.js"></script>
    <script src="/dashboard/assets/js/wow.min.js"></script>
    <script src="/dashboard/assets/js/isotope.pkgd.min.js"></script>
    <script src="/dashboard/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/dashboard/assets/js/count-to.js"></script>
    <script src="/dashboard/assets/js/loopcounter.js"></script>
    <script src="/dashboard/assets/js/jquery.nice-select.min.js"></script>
    <script src="/dashboard/assets/js/bootsnav.js"></script>
    <script src="/dashboard/assets/js/main.js"></script>

</body>
</html>
