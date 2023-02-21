@extends('petugas.theme.master')

@section('content')
    <!-- Container -->
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <!-- Title -->
        <div class="hk-pg-header mb-10">
            <div>
                <h4 class="hk-pg-title"><span class="pg-title-icon"><i class="ion ion-md-analytics"></i></span>Dashboard</h4>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        @php
            $siswa = DB::Table('siswa')->get();
            $buku = DB::Table('buku')->get();
            $pinjam = DB::Table('riwayat_pinjam')
                ->where('status', 'pinjam')
                ->get();
            $kembali = DB::Table('riwayat_pinjam')
                ->where('status', 'selesai')
                ->get();
            $aktivity = DB::Table('riwayat_pinjam')
                ->join('siswa', 'siswa.id_siswa', '=', 'riwayat_pinjam.id_siswa')
                ->join('buku', 'buku.id_buku', '=', 'riwayat_pinjam.id_buku')
                ->select('riwayat_pinjam.*', 'siswa.nama_siswa','siswa.foto', 'buku.nama_buku')
                ->latest()
                ->limit(5)
                ->get();
        @endphp
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Siswa</span>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <span class="d-block">
                                            <span class="display-5 font-weight-400 text-dark">{{ $siswa->count() }}</span>
                                            <small>Siswa Terdaftar</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Buku</span>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <span class="d-block">
                                            <span class="display-5 font-weight-400 text-dark">{{ $buku->count() }}</span>
                                            <small>Buku Terdaftar</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Pinjam</span>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <span class="d-block">
                                            <span class="display-5 font-weight-400 text-dark">{{ $pinjam->count() }}</span>
                                            <small>Siswa Meminjam Buku</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Siswa Aktif
                                    Meminjam</span>
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <span class="d-block">
                                            <span class="display-5 font-weight-400 text-dark">{{ $kembali->count() }}</span>
                                            <small>Siswa</small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-lg">
                            <h6 class="card-header">
                                Aktifitas Terakhir
                            </h6>
                            <div class="card-body">
                                @forelse ($aktivity as  $data)
                                <div class="user-activity">
                                    <div class="media pb-0">
                                        <div class="media-img-wrap">
                                            <div class="avatar avatar-sm">
                                                <img src="/foto_siswa/{{ $data->foto }}" alt="user"
                                                    class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                <span class="d-block mb-5"><span
                                                        class="font-weight-500 text-dark text-capitalize">{{ Str::title($data->nama_siswa) }}</span>
                                                        <span class="pl-5">
                                                            @if ($data->status == "pinjam")
                                                                Melakukan Pinjaman Buku {{ Str::upper($data->nama_buku) }}
                                                            @else
                                                                Melakukan Pengembalian Buku {{ Str::upper($data->nama_buku) }}
                                                            @endif
                                                        </span></span>
                                                <span class="d-block font-13">{{ date('d-F-Y', strtotime($data->updated_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
@endsection
