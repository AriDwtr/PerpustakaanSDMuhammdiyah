@extends('layouts.master')

@section('content')
<div class="banner-area auto-height shadow dark text-light content-top-heading bg-fixed text-normal text-center" style="background-image: url(/perpus/img-1.jpg); height:100%;">

    <div class="item">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="content">
                        <h1>Aplikasi Perpustakaan SD 6 Muhammadiyah Palembang</h1>
                        <form action="{{ route('home.cari') }}" method="get">
                            @csrf
                            <input type="text" placeholder="Cari Judul Buku" class="form-control" name="buku">
                            <button type="submit">
                                <i class="fa fa-search" style="color: white"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
