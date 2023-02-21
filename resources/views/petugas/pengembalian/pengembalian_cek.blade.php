@extends('petugas.theme.master')

@section('content')
    <div class="container-fluid px-xxl-65 px-xl-20 mt-20">
        @if (session('success'))
            <div class="alert alert-success alert-wth-icon fade show" role="alert">
                <span class="alert-icon-wrap"><i class="zmdi zmdi-check-circle"></i></span>
                {{ session('success') }}
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
                        {{-- <div class="col-md-6">
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
                        </div> --}}
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Daftar Buku Yang Di Pinjam</h5>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID Buku</th>
                                                        <th>Judul Buku</th>
                                                        <th>Penerbit</th>
                                                        <th>Foto</th>
                                                        <th>Tanggal Pinjam</th>
                                                        <th>Tanggal Kembali</th>
                                                        <th>Keterlambatan</th>
                                                        <th>Denda</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        function rupiah($angka)
                                                        {
                                                            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                                                            return $hasil_rupiah;
                                                        }
                                                    @endphp
                                                     @php
                                                     $cek_denda = DB::Table('denda')->get();
                                                    @endphp
                                                    @forelse ( $cek_denda as $cek_denda )
                                                        @php $nominal = $cek_denda->nominal_denda; @endphp
                                                    @empty
                                                         @php $nominal = 1000; @endphp
                                                    @endforelse

                                                    @forelse ($pinjam as $data)
                                                        <tr>
                                                            <td>{{ $data->kode_buku }}</td>
                                                            <td>{{ Str::title($data->nama_buku) }}</td>
                                                            <td>{{ Str::upper($data->penerbit) }}</td>
                                                            <td>
                                                                <img src="/foto_buku/{{ $data->foto_buku }}" height="60"
                                                                    width="60" alt="">
                                                            </td>
                                                            <td>
                                                                {{ date('d/F/Y', strtotime($data->created_at)) }}
                                                            </td>
                                                            <td>
                                                                {{ date('d/F/Y', strtotime($data->tanggal_kembali)) }}
                                                            </td>
                                                            <td>
                                                                @php
                                                                    $t = date_create($data->tanggal_kembali);
                                                                    $n = date_create(date('Y-m-d'));
                                                                    $terlambat = date_diff($t, $n);
                                                                    $hari = $terlambat->format('%a');

                                                                    if ($n <= $t) {
                                                                        $denda = 0;
                                                                        echo 'tidak denda';
                                                                    } else {
                                                                        $denda = $hari;
                                                                        echo '<span class="badge badge-danger"> Terlambat ' . $hari . ' Hari </span>';
                                                                    }
                                                                @endphp
                                                            </td>
                                                            <td>
                                                                {{ rupiah($denda * $nominal) }}
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('pengembalian.proses') }}" method="post">
                                                                    @csrf
                                                                    @method('post')
                                                                    <input type="text" name="denda" value="{{ $denda }}" hidden>
                                                                    <input type="text" name="nominal" value="{{ $nominal }}" hidden>
                                                                    <input type="text" name="id" value="{{ $data->id_pinjam }}" hidden>
                                                                    <button type="submit" href="" class="btn btn-success btn-sm btn-rounded" onclick="return confirm('Apakah Buku dan Denda Telah Sesuai Dengan Sistem ?')">Proses Buku</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">Siswa Tidak Memiliki Peminjaman Buku</td>
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
