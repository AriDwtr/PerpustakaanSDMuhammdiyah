@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-book"></i></span>Buku</h4>
        </div>

        @error('foto')
        <div class="alert alert-danger alert-wth-icon fade show" role="alert">
            <span class="alert-icon-wrap"><i class="zmdi zmdi-block"></i></span>
            {{ $message }}
        </div>
        @enderror
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <p class="mb-40">Formulir Pengisian Data Buku Perpustakaan SD 6 Muhammadiyah
                        Palembang</p>
                    <form action="{{ route('buku.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="col-md-12 mb-10">
                                <label for="validationCustom01">Kode Buku</label>
                                <input type="number" name="kode_buku"
                                    class="form-control @error('kode_buku') is-invalid @enderror"
                                    id="validationCustom01" placeholder="Kode Buku" value="{{ old('kode_buku') }}" autofocus>
                                @error('kode_buku')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-10">
                                <label for="validationCustom01">Judul Buku </label>
                                <input type="text" name="judul_buku"
                                    class="form-control @error('judul_buku') is-invalid @enderror"
                                    id="validationCustom01" placeholder="Judul Buku" value="{{ old('judul_buku') }}">
                                @error('judul_buku')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-10">
                                <label>Penerbit</label>
                                <input type="text" name="penerbit"
                                    class="form-control @error('penerbit') is-invalid @enderror"
                                    value="{{ old('penerbit') }}" placeholder="Penerbit">
                                @error('penerbit')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-10">
                                <label for="validationCustom01">Rak Buku</label>
                                <select class="form-control custom-select @error('rak') is-invalid @enderror" name="rak">
                                    <option value="">Pilih Rak Buku</option>
                                    @foreach ($rak as $data)
                                        <option value="{{ $data->id_rak }}" {{ $data->id_rak == old('rak') ? 'selected' : '' }}>{{ Str::title($data->jenis_rak) }}</option>
                                    @endforeach
                                </select>
                                @error('rak')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-2 mb-10">
                                <label for="validationCustom01">Stok Buku</label>
                                <input type="number" name="stok"
                                    class="form-control @error('stok') is-invalid @enderror"
                                    id="validationCustom01" value="{{ old('stok') }}" placeholder="Stok Buku">
                                @error('stok')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm">
                                <label for="validationCustom01">Foto Buku</label>
                                <input type="file" id="input-file-now" name="foto" class="dropify" />
                                @error('foto')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-success btn-wth-icon mt-10 w-100" type="submit">
                            <span class="btn-text">Tambahkan Buku Baru</span>
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
