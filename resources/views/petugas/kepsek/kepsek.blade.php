@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <!-- Title -->
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon">
                    <i class="material-icons">school</i></span>Data Kepala Sekolah
            </h4>
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
        @php
            $cek_kepsek = DB::Table('kepala_sekolah')->get();
        @endphp
        <div class="row justify-content-md-center">
            <div class="col-xl-10">
                <section class="hk-sec-wrapper">
                    @if ($cek_kepsek->count() < 1)
                        <p class="mb-40">
                            <button class="btn btn-success btn-wth-icon btn-sm" data-toggle="modal"
                                data-target="#createkepsek">
                                <span class="icon-label">
                                    <span class="material-icons">
                                        control_point
                                    </span>
                                </span>
                                <span class="btn-text">Tambah Data Kepala Sekolah</span>
                            </button>
                        </p>
                    @endif
                    <div class="modal fade" id="createkepsek" tabindex="-1" role="dialog" aria-labelledby="createkepsek"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Form Tambah Kepala Sekolah</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('kepsek.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <div class="form-group">
                                                <label for="validationCustom01">Nomor Induk Kepala Sekolah</label>
                                                <input type="number" class="form-control" name="nip_kepsek"
                                                    id="validationCustom01" placeholder="Nomor Induk" required>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="form-group">
                                                <label for="validationCustom01">Nama Lengkap Kepala Sekolah</label>
                                                <input type="text" class="form-control" name="nama_kepsek"
                                                    id="validationCustom01" placeholder="Nama Kepala Sekolah" required>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="form-group">
                                                <label for="validationCustom01">Jenis Kelamin Kepala Sekolah</label>
                                                <select class="form-control custom-select" name="jenis_kelamin_kepsek">
                                                    <option value="l" selected>Laki - Laki</option>
                                                    <option value="p">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="form-group">
                                                <label for="validationCustom01">Tanggal Lahir Kepala Sekolah</label>
                                                <input type="date" class="form-control" name="tgl_lahir_kepsek"
                                                    id="validationCustom01" required>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="form-group">
                                                <label for="validationCustom01">Foto Kepala Sekolah</label>
                                                <input type="file" id="input-file-now" name="foto_kepsek" class="dropify" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button class="btn btn-success" type="submit">Simpan
                                            Data Kepala Sekolah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </p>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                            <tr>
                                                <th>Nomor Induk Pegawai Kepala Sekolah</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($kepsek as $data)
                                                <tr>
                                                    <td><b>{{ $data->nip_kepsek }}</b></td>
                                                    <td>{{ Str::title($data->nama_kepsek) }}</td>
                                                    <td class="text-center">
                                                        @if ($data->jenis_kelamin_kepsek == "l")
                                                            Laki - Laki
                                                        @else
                                                            Perempuan
                                                        @endif
                                                    </td>
                                                    <td>{{ date('d F Y', strtotime($data->tgl_lahir_kepsek)) }}</td>
                                                    <td>
                                                        <img src="/foto_kepsek/{{ $data->foto_kepsek }}" height="30"
                                                        width="35" alt="">
                                                    </td>
                                                    <td>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#updatekepsek{{ $data->id_kepsek }}" class="mr-25"
                                                            data-toggle="tooltip" data-original-title="Edit"> <i
                                                                class="icon-pencil"></i> </a>
                                                        <a href="{{ route('kepsek.destroy', $data->id_kepsek) }}"
                                                            data-toggle="tooltip" data-original-title="Hapus"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('kepsek-delete-form-{{ $data->id_kepsek }}').submit();">
                                                            <i class="icon-trash txt-danger" style="color: red"></i></a>
                                                        <form id="kepsek-delete-form-{{ $data->id_kepsek }}"
                                                            action="{{ route('kepsek.destroy', $data->id_kepsek) }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </td>
                                                    <div class="modal fade" id="updatekepsek{{ $data->id_kepsek }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="updatekepsek{{ $data->id_kepsek }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit kepsek</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('kepsek.update', $data->id_kepsek) }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <div class="mb-2">
                                                                            <div class="form-group">
                                                                                <label for="validationCustom01">Nomor Induk Kepala Sekolah</label>
                                                                                <input type="number" class="form-control" name="nip_kepsek" value="{{ $data->nip_kepsek }}"
                                                                                    id="validationCustom01" placeholder="Nomor Induk" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <div class="form-group">
                                                                                <label for="validationCustom01">Nama Lengkap Kepala Sekolah</label>
                                                                                <input type="text" class="form-control" name="nama_kepsek"
                                                                                    id="validationCustom01" placeholder="Nama Kepala Sekolah" value="{{ $data->nama_kepsek }}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <div class="form-group">
                                                                                <label for="validationCustom01">Jenis Kelamin Kepala Sekolah</label>
                                                                                <select class="form-control custom-select" name="jenis_kelamin_kepsek">
                                                                                    <option value="l" {{ $data->jenis_kelamin_kepsek == "l" ? 'selected' : '' }}>Laki - Laki</option>
                                                                                    <option value="p" {{ $data->jenis_kelamin_kepsek == "p" ? 'selected' : '' }}>Perempuan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <div class="form-group">
                                                                                <label for="validationCustom01">Tanggal Lahir Kepala Sekolah</label>
                                                                                <input type="date" class="form-control" value="{{ $data->tgl_lahir_kepsek }}" name="tgl_lahir_kepsek"
                                                                                    id="validationCustom01" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-2">
                                                                            <div class="form-group">
                                                                                <label for="validationCustom01">Foto Kepala Sekolah</label>
                                                                                <input type="file" id="input-file-now" name="foto_kepsek" class="dropify" data-default-file="/foto_kepsek/{{ $data->foto_kepsek }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button class="btn btn-success"
                                                                            type="submit">Perbaharui
                                                                            Data Kepala Sekolah</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">Data Kepala Sekolah Tidak Ada
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(700, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>

     <!-- Dropzone JavaScript -->
	<script src="/theme/vendors/dropzone/dist/dropzone.js"></script>

	<!-- Dropify JavaScript -->
	<script src="/theme/vendors/dropify/dist/js/dropify.min.js"></script>

	<!-- Form Flie Upload Data JavaScript -->
	<script src="/theme/dist/js/form-file-upload-data.js"></script>
@endsection
