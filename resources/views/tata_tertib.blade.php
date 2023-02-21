@extends('layouts.master')

@section('content')
<div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url(/perpus/img-1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Tata Tertib Peminjaman</h1>
            </div>
        </div>
    </div>
</div>

<div class="faq-area left-sidebar course-details-area default-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 faq-content">
                <!-- Start Accordion -->
                <div class="acd-items acd-arrow">
                    <div class="panel-group symb" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                        Tata Tertib Peminjaman Buku
                                    </a>
                                </h4>
                            </div>
                            <div id="ac1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>
                                     Tata Terbit Dalam Melakukan Transaksi Peminjaman Buku di SD Muhammadiyah 6 Palembang
                                     yang harus Di Patuhi Oleh Seluruh Siswa SD Muhammadiyah 6 Palembang
                                   </p>
                                    <ul>
                                        <li>Siswa Di Wajibkan Mendaftarkan Diri Sebagai Anggota Perpustakaan</li>
                                        <li>Telah Mengembalikan Semua Buku Yang Di Pinjam Sebelumnya</li>
                                        <li>Memberikan Buku dan Kartu Anggota Kepada Petugas Perpustakaan Untuk Proses Peminjaman</li>
                                        <li>Siswa Hanya Dapat Meminjam Maksimal 3 Buku </li>
                                        <li>Dilarang Bagi Siswa Yang Meminjam Buku untuk Mencoret, Menyobek, atau Menghilangkan Buku Yang Di Pinjam</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                        Tata Tertib Pengembalian / Mengembalikan Buku
                                    </a>
                                </h4>
                            </div>
                            <div id="ac2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>
                                         Tata Tertib bagi Siswa SD Muhammadiyah 6 Palembang dalam proses Pengembalian Buku di Perpustakaan
                                         yang wajib di patuhi oleh seluruh siswa / anggota Perpustakaan SD Muhammadiyah 6 Palembang
                                    </p>
                                    <ul>
                                        <li>Membawa Kartu Anggota Perpustakaan dan Membawa Buku yang akan di Kembalikan</li>
                                        <li>Buku Dalam Keadaan Baik dan Tidak di Coret - Coret</li>
                                        <li>Keterlambatan Pengembalian Akan Di Kenakan Denda Rp 1.000  Perhari</li>
                                        <li>Menghilangkan Buku Akan Di Denda Rp 50.000 PerBuku yang hilang</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#ac3">
                                        Tata Tertib Pendaftaraan Angoota Perpustakaan
                                    </a>
                                </h4>
                            </div>
                            <div id="ac3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>
                                        Tata Tertib Siswa Dalam Melakukan Pendaftaraan sebagai Anggota Perpustakaan di SD Muhammadiyah 6 Palembang
                                    </p>
                                    <ul>
                                        <li>Siswa SD Muhammadiyah 6 Palembang</li>
                                        <li>Minimal Siswa Berada pada kelas 3 SD</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Accordion -->
            </div>
        </div>
    </div>
</div>
@endsection
