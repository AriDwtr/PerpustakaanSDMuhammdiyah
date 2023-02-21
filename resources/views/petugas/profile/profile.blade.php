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
                                <a href="{{ route('profile.index') }}" class="d-flex h-60p align-items-center nav-link {{ (request()->is('petugas/profile')) ? 'active' : '' }}">Data Akun</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('profile.foto') }}" class="d-flex h-60p align-items-center nav-link">Foto Profile</a>
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
                                <div class="col-lg-8">
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
                                            <form action="{{ route('profile.profile', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-10">
                                                        <label for="validationCustom01">Nomor Induk Pegawai</label>
                                                        <input type="number" name="nip"
                                                            class="form-control @error('nip') is-invalid @enderror"
                                                            id="validationCustom01" placeholder="Nomor Induk Pegawai"
                                                            value="{{ Auth::user()->nip }}" autofocus>
                                                        @error('nip')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom01">Nama Lengkap Petugas</label>
                                                        <input type="text" name="nama_petugas"
                                                            class="form-control @error('nama_petugas') is-invalid @enderror"
                                                            id="validationCustom01" placeholder="Nama Lengkap Siswa"
                                                            value="{{ Auth::user()->name }}">
                                                        @error('nama_petugas')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom01">No. Telp</label>
                                                        <input type="number" name="telp"
                                                            class="form-control @error('telp') is-invalid @enderror"
                                                            id="validationCustom01" placeholder="No Telp"
                                                            value="{{ Auth::user()->telp }}">
                                                        @error('telp')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <button class="btn btn-danger btn-wth-icon mt-10 w-100" type="submit">
                                                        <span class="btn-text">Perbaharui Data Profile</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card card-profile-feed">
                                        <div class="card-header card-header-action">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <div class="text-capitalize font-weight-500 text-dark">Ubah Password
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('profile.password', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-10">
                                                        <label for="validationCustom01">Tulis Password</label>
                                                        <input type="password" name="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            placeholder="Tulis Password" id="myInput">
                                                        @error('password')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-10">
                                                        <label for="validationCustom01">Tulis Ulang Password</label>
                                                        <input type="password" name="repassword"
                                                            class="form-control @error('repassword') is-invalid @enderror"
                                                            placeholder="Tulis Ulang Password" id="myInput2">
                                                        @error('repassword')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="custom-control custom-checkbox mb-25">
                                                        <input class="custom-control-input" id="same-address" type="checkbox" onclick="myFunction()">
                                                        <label class="custom-control-label font-14" for="same-address">Lihat Password</label>
                                                    </div>
                                                    <button class="btn btn-info btn-wth-icon mt-10 w-100" type="submit">
                                                        <span class="btn-text">Perbaharui Password Akun</span>
                                                    </button>
                                                </div>
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
@endsection
