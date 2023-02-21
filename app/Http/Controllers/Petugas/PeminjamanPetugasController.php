<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Pinjam;
use App\Models\Riwayat;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PeminjamanPetugasController extends Controller
{
    public function index()
    {
        return view('petugas.peminjaman.peminjaman');
    }

    public function cek(Request $request)
    {
        $request->validate([
            'barcode'=>'required'
        ]);

        $barcode = $request->barcode;

        $buku = Buku::where('stok_buku','>',0)->orderBy('nama_buku', 'ASC')->get();

        $siswa = Siswa::join('kelas','kelas.id_kelas','=','siswa.kelas')
        ->select('siswa.*', 'kelas.jenis_kelas')
        ->where('siswa.barcode', $barcode)
        ->get();

        if($siswa->count() < 1)
        {
            return back()->with('fail','Mohon Maaf Data Siswa Tidak Di Temukan');
        }


        return view('petugas.peminjaman.peminjaman_cek', compact(['siswa','buku']));
    }


    public function pinjam(Request $request)
    {
        $siswa = Pinjam::where('id_siswa',$request->siswa)->get();
        $count =$siswa->count();

        if ($count > 0) {
            return back()->with('fail','Maaf Siswa Masih Memiliki Pinjaman Buku');
        }

        $request->validate([
            'buku1'=>'required'
        ]);

        $id_buku1 = $request->buku1;

        $tanggal = date('Y-m-d', strtotime("+7 day", strtotime(date("Y-m-d"))));

        Pinjam::create([
            'id_siswa'=>$request->siswa,
            'id_buku'=>$request->buku1,
            'tanggal_kembali'=>$tanggal

        ]);

        Buku::find($id_buku1)->decrement('stok_buku');

        Riwayat::create([
            'id_siswa'=>$request->siswa,
            'id_buku'=>$request->buku1,
            'tanggal_kembali'=>$tanggal,
            'status'=>'pinjam'
        ]);

        if (!empty($request->buku2)) {
            Pinjam::create([
                'id_siswa'=>$request->siswa,
                'id_buku'=>$request->buku2,
                'tanggal_kembali'=>$tanggal
            ]);

            $id_buku2 = $request->buku2;

            Buku::find($id_buku2)->decrement('stok_buku');

            Riwayat::create([
                'id_siswa'=>$request->siswa,
                'id_buku'=>$request->buku2,
                'tanggal_kembali'=>$tanggal,
                'status'=>'pinjam'
            ]);
        }
        if (!empty($request->buku3)) {
            Pinjam::create([
                'id_siswa'=>$request->siswa,
                'id_buku'=>$request->buku3,
                'tanggal_kembali'=>$tanggal
            ]);

            $id_buku3 = $request->buku3;

            Buku::find($id_buku3)->decrement('stok_buku');

            Riwayat::create([
                'id_siswa'=>$request->siswa,
                'id_buku'=>$request->buku3,
                'tanggal_kembali'=>$tanggal,
                'status'=>'pinjam'
            ]);
        }

        return to_route('peminjaman.index')->with('success', 'Berhasil Melakukan Peminjaman Buku');
    }
}
