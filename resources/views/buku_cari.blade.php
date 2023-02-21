@extends('layouts.master')

@section('content')
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light"
        style="background-image: url(/perpus/img-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Buku</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="faq-area left-sidebar course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 faq-content">
                    <!-- Start Accordion -->
                    <div class="row">
                        <div class="popular-courses-items bottom-price">
                            @forelse ($buku as $data)
                                <div class="col-md-6 col-sm-4 equal-height">
                                    <div class="advisor-item">
                                        <div class="info-box">
                                            <img src="/foto_buku/{{ $data->foto_buku }}" alt="Thumb">
                                            <div class="info-title">
                                                <h4>{{ Str::title($data->nama_buku) }}</h4>
                                                <span>{{ Str::upper($data->jenis_rak) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-danger">Maaf Buku Dengan Judul Pencarian Tidak Tersedia</div>
                            @endforelse
                        </div>
                    </div>
                    <!-- End Accordion -->
                </div>
                <!-- Start Sidebar -->
                <div class="left-sidebar col-md-4">
                    <div class="sidebar">
                        <aside>
                            <!-- Sidebar Item -->
                            <div class="sidebar-item search">
                                <div class="sidebar-info">
                                    <form action="{{ route('home.cari') }}" method="get">
                                        @csrf
                                        <input type="text" name="buku" placeholder="Cari Buku" class="form-control">
                                        <input type="submit" value="search">
                                    </form>
                                </div>
                            </div>
                            <!-- End Sidebar Item -->

                            <!-- Sidebar Item -->
                            {{-- <div class="sidebar-item category">
                                <div class="title">
                                    <h4>Courses Category</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li>
                                            <a href="#">Java Programming <span>23</span></a>
                                        </li>
                                        <li>
                                            <a href="#">Social Science <span>0</span></a>
                                        </li>
                                        <li>
                                            <a href="#">Business Management <span>12</span></a>
                                        </li>
                                        <li>
                                            <a href="#">Online Learning <span>17</span></a>
                                        </li>
                                        <li>
                                            <a href="#">Course Management <span>0</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                            <!-- End Sidebar Item -->

                            <!-- Sidebar Item -->
                            <div class="sidebar-item recent-post">
                                <div class="title">
                                    <h4>Buku Rekomendasi Untuk Di Baca</h4>
                                </div>
                                @foreach ($random as $buku)
                                <div class="item">
                                    <div class="content">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="/foto_buku/{{ $buku->foto_buku }}" alt="Thumb">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4>
                                                <a href="#">{{ Str::title($buku->nama_buku) }}</a>
                                            </h4>
                                            <div class="meta">
                                                <i class="fas fa-dolly"></i><a href="#">{{ Str::upper($buku->jenis_rak) }}</a><br>
                                                <i class="fas fa-dolly"></i>Penerbit : <a href="#">{{ Str::upper($buku->penerbit) }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- End Sidebar Item -->

                        </aside>
                    </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </div>
    {{-- <div class="popular-courses default-padding bottom-less without-carousel">
        <div class="container">
            <div class="row">
                <div class="popular-courses-items bottom-price">
                    @forelse ($buku as $data)
                        <div class="col-md-3 col-sm-3 equal-height">
                            <div class="advisor-item">
                                <div class="info-box">
                                    <img src="/foto_buku/{{ $data->foto_buku }}" alt="Thumb">
                                    <div class="info-title">
                                        <h4>{{ Str::title($data->nama_buku) }}</h4>
                                        <span>{{ Str::upper($data->jenis_rak) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">Maaf Buku Dengan Judul Pencarian Tidak Tersedia</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div> --}}
@endsection
