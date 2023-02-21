@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-graduation-cap"></i></span>Siswa</h4>
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
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">Data Siswa</h5>
                    <p class="mb-20">Data Siswa Yang Terdaftar Sebagai Anggota Perpustakaan dan Dapat Melakukan Peminjaman
                        Buku</p>
                    <a href="{{ route('siswa.create') }}" class="btn btn-success btn-wth-icon btn-sm mb-20">
                        <span class="icon-label">
                            <span class="material-icons">
                                person_add
                            </span>
                        </span>
                        <span class="btn-text">Tambah Siswa Baru</span>
                    </a>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datable_1" class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            {{-- <th>Barcode</th> --}}
                                            <th>Nama Siswa</th>
                                            <th>Gender</th>
                                            <th>Kelas</th>
                                            <th>Foto</th>
                                            <th>Tanggal Terdaftar</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $data)
                                            <tr>
                                                <td><b>{{ $data->nis }}</b></td>
                                                {{-- <td>{!! DNS1D::getBarcodeHTML($data->barcode, 'CODABAR') !!}</td> --}}
                                                <td>{{ Str::title($data->nama_siswa) }}</td>
                                                <td>
                                                    @if ($data->jenis_kelamin == 'l')
                                                        Laki - Laki
                                                    @else
                                                        Perempuan
                                                    @endif
                                                </td>
                                                <td>{{ Str::upper($data->jenis_kelas) }}</td>
                                                <td>
                                                    @if ($data->foto == null)
                                                        <img src="/perpus/default.jpg" height="30" width="35"
                                                            alt="">
                                                    @else
                                                        <img src="/foto_siswa/{{ $data->foto }}" height="30"
                                                            width="35" alt="">
                                                    @endif
                                                </td>
                                                <td>{{ date('d/M/Y', strtotime($data->created_at)) }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('siswa.show', $data->id_siswa) }}"
                                                        class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-3"
                                                        data-toggle="tooltip" data-placement="top" title="Cetak">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">
                                                                print
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('siswa.edit', $data->id_siswa) }}"
                                                        class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-3"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">
                                                                edit
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('siswa.destroy', $data->id_siswa) }}"
                                                        class="btn btn-icon btn-icon-circle btn-blue btn-icon-style-3"
                                                        data-toggle="tooltip" data-placement="top" title="Hapus"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('siswa-delete-form-{{ $data->id_siswa }}').submit();">
                                                        <span class="btn-icon-wrap">
                                                            <span class="material-icons">
                                                                delete
                                                            </span>
                                                        </span>
                                                    </a>
                                                    <form id="siswa-delete-form-{{ $data->id_siswa }}"
                                                        action="{{ route('siswa.destroy', $data->id_siswa) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- Data Table CSS -->
    <link href="/theme/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="/theme/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(700, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
    <!-- Data Table JavaScript -->
    <script src="/theme/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/theme/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/theme/vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="/theme/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/theme/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/theme/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/theme/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/theme/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/theme/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="/theme/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/theme/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/theme/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/theme/dist/js/dataTables-data.js"></script>
@endsection
