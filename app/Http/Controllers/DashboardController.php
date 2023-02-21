<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function visi()
    {
        return view('visi');
    }

    public function profile()
    {
       return view('profile');
    }

    public function tata_tertib()
    {
        return view('tata_tertib');
    }

    public function buku()
    {
        $buku = Buku::join('rak','rak.id_rak','=','buku.rak')
        ->select('buku.*','rak.jenis_rak')
        ->orderBy('buku.nama_buku', 'ASC')
        ->get();

        return view('buku', compact(['buku']));
    }

    public function cari(Request $request)
    {
        $random = Buku::join('rak','rak.id_rak','=','buku.rak')
        ->select('buku.*','rak.jenis_rak')
        ->inRandomOrder()
        ->limit(5)
        ->get();

        $buku = Buku::join('rak','rak.id_rak','=','buku.rak')
        ->select('buku.*','rak.jenis_rak')
        ->where('buku.nama_buku','LIKE','%'.$request->buku.'%')
        ->get();

        return view('buku_cari', compact(['buku','random']));
    }
}
