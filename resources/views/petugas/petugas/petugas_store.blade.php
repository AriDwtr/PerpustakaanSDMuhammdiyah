@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="material-icons">groups</i></span>Petugas Perpustakaan</h4>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <p class="mb-40">Formulir Pengisian Data Petugas Pendaftaraan Sebagai Petugas Perpustakaan SD 6 Muhammadiyah
                        Palembang</p>
                    <form action="{{ route('petugas.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="col-md-12 mb-10">
                                <label for="validationCustom01">Nomor Induk Pegawai</label>
                                <input type="number" name="nip"
                                    class="form-control @error('nip') is-invalid @enderror"
                                    id="validationCustom01" placeholder="Nomor Induk Pegawai" value="{{ old('nip') }}" autofocus>
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
                                    id="validationCustom01" placeholder="Nama Lengkap Siswa" value="{{ old('nama_petugas') }}">
                                @error('nama_petugas')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-10">
                                <label for="validationCustom01">No. Telp</label>
                                <input type="number" name="telp"
                                    class="form-control @error('telp') is-invalid @enderror"
                                    id="validationCustom01" placeholder="No Telp" value="{{ old('telp') }}">
                                @error('telp')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm">
                                <label for="validationCustom01">Foto Petugas</label>
                                <input type="file" id="input-file-now" name="foto" class="dropify" />
                            </div>
                        </div>
                        <button class="btn btn-success btn-wth-icon mt-10 w-100" type="submit">
                            <span class="btn-text">Tambahkan Petugas</span>
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('css')
<!-- Bootstrap Dropzone CSS -->
<link href="/theme/vendors/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>

<!-- Bootstrap Dropzone CSS -->
<link href="/theme/vendors/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section('js')
    <!-- Dropzone JavaScript -->
	<script src="/theme/vendors/dropzone/dist/dropzone.js"></script>

	<!-- Dropify JavaScript -->
	<script src="/theme/vendors/dropify/dist/js/dropify.min.js"></script>

	<!-- Form Flie Upload Data JavaScript -->
	<script src="/theme/dist/js/form-file-upload-data.js"></script>
@endsection
