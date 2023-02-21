@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading mb-10">Catatan Perihal Peminjaman Buku</h4>
                    <p>Beberapa hal yang dapat di sampaikan kepada siswa mengenai peraturan dalam peminjaman buku
                        di perpustakaan SD 6 Muhammadiyah Palembang
                    </p>
                    <hr class="hr-soft-info">
                    @php
                        $cek_denda = DB::Table('denda')->get();
                    @endphp
                    <ul class="list-ul">
                        <li class="mb-5"><span>Siswa Di Wajibkan Mendaftarkan diri sebagai Anggota Perpustakaan Untuk Bisa
                                Melaukan Peminjaman Buku</span></li>
                        <li><span>Waktu Peminjaman Buku Hanya 7 Hari. Apabila Melewati Waktu Pengembalian Akan Di Kena Kan
                                Denda</span></li>
                        @forelse ($cek_denda as $cek_denda)
                        <li><span>Tarif Denda Yaitu Rp. {{ $cek_denda->nominal_denda }} / Hari</span></li>
                        @empty
                        <li><span>Tarif Denda Yaitu Rp. 1000 / Hari</span></li>
                        @endforelse
                        <li><span>Apabila Buku Hilang Maka Siswa Diberlakukan denda Rp.50.000 / Buku</span></li>
                    </ul>
                </div>
            </div>
        </div>
        @if (session('fail'))
        <div class="alert alert-danger alert-wth-icon fade show" role="alert">
            <span class="alert-icon-wrap"><i class="zmdi zmdi-block"></i></span>
            {{ session('fail') }}
        </div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    @foreach ($siswa as $siswa)
                        <div class="col-md-6">
                            <div class="card text-white">
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
                                                {!! DNS1D::getBarcodeHTML($siswa->barcode, 'C39') !!}
                                            </span>
                                        </div>
                                    </div>
                                    <p class="card-title">{{ $siswa->barcode }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-white">
                                <div class="card-header">
                                    <p style="color: black">Pemilihan Buku Untuk Di Pinjam <span style="color:red">*
                                            Maksimal 3 Buku</span></p>
                                </div>
                                <div class="card-body bg-white" style="color:black">
                                    <p class="text-mute" style="color:grey">Scan Kode Buku Agar Lebih Cepat Dalam Proses
                                        Pemesanan</p>
                                    <form action="{{ route('peminjaman.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <input type="text" name="siswa" value="{{ $siswa->id_siswa }}" id="" hidden>
                                        <label for="" class="mt-10">Buku 1</label>
                                        <select class="form-control select2 @error('buku1') is-invalid @enderror"
                                            name="buku1" autofocus>
                                            <option value="">Pilih Buku</option>
                                            <optgroup label="Daftar Buku">
                                                @foreach ($buku as $data)
                                                    <option value="{{ $data->id_buku }}">[{{ $data->kode_buku }}] -
                                                        {{ Str::title($data->nama_buku) }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        @error('buku1')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <label for="" class="mt-10">Buku 2</label>
                                        <select class="form-control select2" name="buku2" autofocus>
                                            <option value="">Pilih Buku</option>
                                            <optgroup label="Daftar Buku">
                                                @foreach ($buku as $data)
                                                    <option value="{{ $data->id_buku }}">[{{ $data->kode_buku }}] -
                                                        {{ Str::title($data->nama_buku) }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        <label for="" class="mt-10">Buku 3</label>
                                        <select class="form-control select2" name="buku3" autofocus>
                                            <option value="">Pilih Buku</option>
                                            <optgroup label="Daftar Buku">
                                                @foreach ($buku as $data)
                                                    <option value="{{ $data->id_buku }}">[{{ $data->kode_buku }}] -
                                                        {{ Str::title($data->nama_buku) }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        <button class="btn btn-success w-100 mt-10" type="submit" name="submit">Proses
                                            Peminjaman Buku</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- select2 CSS -->
    <link href="/theme/vendors/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <!-- Select2 JavaScript -->
    <script src="/theme/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="/theme/dist/js/select2-data.js"></script>
@endsection
