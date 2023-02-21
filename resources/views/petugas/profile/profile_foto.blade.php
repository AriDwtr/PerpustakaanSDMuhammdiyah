@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12 pa-0">
                <div class="profile-cover-wrap overlay-wrap">
                    <div class="profile-cover-img" style="background-image:url('/perpus/img-1.jpg')"></div>
                    <div class="bg-overlay bg-trans-dark-60"></div>
                    <div class="container-fluid px-xxl-65 px-xl-20 profile-cover-content py-50">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="media align-items-center">
                                    <div class="media-img-wrap  d-flex">
                                        <div class="avatar">
                                            @if (Auth::user()->foto == null)
                                                <img src="/theme/dist/img/avatar12.jpg" alt="user"
                                                    class="avatar-img rounded-circle">
                                            @else
                                                <img src="/foto_petugas/{{ Auth::user()->foto }}" alt="user"
                                                    class="avatar-img rounded-circle">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="text-white text-capitalize display-6 mb-5 font-weight-400">
                                            {{ Str::title(Auth::user()->name) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-bottom">
                    <div class="container-fluid px-xxl-65 px-xl-20">
                        <ul class="nav nav-light nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="{{ route('profile.index') }}"
                                    class="d-flex h-60p align-items-center nav-link">Data
                                    Akun</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="d-flex h-60p align-items-center nav-link active">Foto Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-wth-icon fade show" role="alert">
                        <span class="alert-icon-wrap"><i class="zmdi zmdi-check-circle"></i></span>
                        {{ session('success') }}
                    </div>
                @elseif (session('fail'))
                    <div class="alert alert-danger alert-wth-icon fade show" role="alert">
                        <span class="alert-icon-wrap"><i class="zmdi zmdi-block"></i></span>
                        {{ session('fail') }}
                    </div>
                @endif

                <div class="tab-content mt-sm-20 mt-20">
                    <div class="tab-pane fade show active" role="tabpanel">
                        <div class="container-fluid px-xxl-65 px-xl-20">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-profile-feed">
                                        <div class="card-header card-header-action">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <div class="text-capitalize font-weight-500 text-dark">Data Diri
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('profile.foto_update', Auth::user()->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="form-row">
                                                    <div class="col-sm">
                                                        <label for="validationCustom01">Foto Siswa</label>
                                                        @if (Auth::user()->foto == null)
                                                            <input type="file" id="input-file-now" name="foto"
                                                                class="dropify" />
                                                        @else
                                                            <input type="file" id="input-file-now" name="foto"
                                                                class="dropify"
                                                                data-default-file="/foto_petugas/{{ Auth::user()->foto }}" />
                                                        @endif
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success mt-30 w-100">Perbaharui Foto Profile</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
@endsection

@section('css')
<link href="/theme/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>

<!-- Bootstrap Dropzone CSS -->
<link href="/theme/vendors/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section('js')
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            var y = document.getElementById("myInput2");
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }

        window.setTimeout(function() {
            $(".alert").fadeTo(700, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>

    <script src="/theme/vendors/dropzone/dist/dropzone.js"></script>

    <!-- Dropify JavaScript -->
    <script src="/theme/vendors/dropify/dist/js/dropify.min.js"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script src="/theme/dist/js/form-file-upload-data.js"></script>
@endsection
