@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="hk-pg-header">
            <a href="javascript:window.print()" class="btn btn-danger btn-sm noPrint"><i class="fa fa-print"></i> Cetak
                Kartu</a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="col-md-6">
                    <div class="card text-white border-success">
                        <div class="card-header bg-success">
                            <div class="row">
                                <div class="col-2">
                                    <img src="/perpus/logo-white.png" height="90" width="70" alt="">
                                </div>
                                <div class="col-10">
                                    <h5 class="text-center" style="color: white">Kartu Anggota Perpustakaan</h5>
                                    <h5 class="text-center mt-5" style="color: white">SD Muhammadiyah 6 Palembang</h5>
                                    <p class="text-center mt-5">Jl. Kol. H. Burlian No.1466, Ario Kemuning, Sukmajaya&nbsp;
                                        Kota Palembang, Sumatera Selatan 30151</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-white" style="color:black">
                            <div class="row">
                                <div class="col-4">
                                    @if ($siswa->foto == null)
                                        <img src="/perpus/default.jpg" height="100" width="100" alt="">
                                    @else
                                        <img src="/foto_siswa/{{ $siswa->foto }}" height="100" width="100"
                                            alt="">
                                    @endif
                                </div>
                                <div class="col-8">
                                    <table border="0">
                                        <thead>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 3px"><b>Nama Lengkap</b></td>
                                                <td><b>&nbsp;: </b></td>
                                                <td>
                                                    &nbsp;{{ Str::upper($siswa->nama_siswa) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 3px"><b>NIS</b></td>
                                                <td><b>&nbsp;: </b></td>
                                                <td>
                                                    &nbsp;{{ Str::upper($siswa->nis) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 3px"><b>Kelas</b></td>
                                                <td><b>&nbsp;: </b></td>
                                                <td>
                                                    &nbsp;{{ Str::upper($siswa->jenis_kelas) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 3px"><b>Jenis Kelamin</b></td>
                                                <td><b>&nbsp;: </b></td>
                                                <td>
                                                    @if ($siswa->jenis_kelamin == 'l')
                                                        &nbsp;Laki - Laki
                                                    @else
                                                        &nbsp;Perempuan
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <span>
                                        {!! DNS1D::getBarcodeHTML($siswa->barcode, 'C39') !!} <br>
                                    </span>
                                </div>
                            </div>
                            <p class="card-title">{{ $siswa->barcode }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection
