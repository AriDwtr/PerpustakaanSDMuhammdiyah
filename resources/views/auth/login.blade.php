<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>SI - Perpustakaan</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="/perpus/logo.png" type="image/x-icon">

    <!-- Toggles CSS -->
    <link href="/theme/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="/theme/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="/theme/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- HK Wrapper -->
    <div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper"
            style="background-image: url('/perpus/img-1.jpg');background-size: cover;">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="auth-form-wrap pt-xl-0 pt-70">
                            <div class="auth-form w-xl-35 w-lg-65 w-sm-85 w-100 card pa-25 shadow-lg">
                                @if (session('fail'))
                                    <div class="alert alert-danger alert-wth-icon fade show" role="alert">
                                        <span class="alert-icon-wrap"><i class="zmdi zmdi-block"></i></span>
                                        {{ session('fail') }}
                                    </div>
                                @endif
                                <a class="auth-brand text-center d-block mb-20" href="#">
                                    <img class="brand-img" src="/perpus/logo.png" height="70" alt="brand" />
                                </a>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    @method('post')
                                    <h1 class="display-4 text-center mb-10">Sistem Informasi</h1>
                                    <p class="text-center mb-30">Perpustakaan SD 6 Muhammadiyah Palembang</p>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Nomor Induk Pegawai" type="number"
                                            name="nip">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password"
                                            type="password" value="" id="myInput">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-25">
                                        <input class="custom-control-input" id="same-address" type="checkbox"
                                            onclick="myFunction()">
                                        <label class="custom-control-label font-14" for="same-address">Lihat
                                            Password</label>
                                    </div>
                                    <button class="btn btn-success btn-block" type="submit">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        window.setTimeout(function() {
            $(".alert").fadeTo(700, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
    <script src="/theme/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/theme/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Jasny-bootstrap  JavaScript -->
    <script src="/theme/vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="/theme/dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="/theme/dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="/theme/dist/js/feather.min.js"></script>

    <!-- Toggles JavaScript -->
    <script src="/theme/vendors/jquery-toggles/toggles.min.js"></script>
    <script src="/theme/dist/js/toggle-data.js"></script>

    <!-- Init JavaScript -->
    <script src="/theme/dist/js/init.js"></script>
</body>

</html>
