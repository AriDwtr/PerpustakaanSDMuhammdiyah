<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Pinjam;
use App\Models\Riwayat;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PengambalianPetugasController extends Controller
{
    public function index()
    {
        $pinjam = Pinjam::join('siswa','siswa.id_siswa','=','pinjambuku.id_siswa')
        ->join('kelas','kelas.id_kelas','=','siswa.kelas')
        ->join('buku','buku.id_buku','=','pinjambuku.id_buku')
        ->select('pinjambuku.*','buku.nama_buku','buku.kode_buku','buku.foto_buku','siswa.nis','siswa.nama_siswa','kelas.jenis_kelas')
        ->latest()
        ->get();

        return view('petugas.pengembalian.pengembalian', compact(['pinjam']));
    }

    public function scan(Request $request)
    {
        $request->validate([
            'barcode'=>'required'
        ]);

        $barcode = $request->barcode;

        $siswa = Siswa::join('kelas','kelas.id_kelas','=','siswa.kelas')
        ->select('siswa.*', 'kelas.jenis_kelas')
        ->where('siswa.barcode', $barcode)
        ->get();

        if($siswa->count() < 1)
        {
            return back()->with('fail','Mohon Maaf Data Siswa Tidak Di Temukan');
        }

        foreach ($siswa as $cek) {
            $id = $cek->id_siswa;
        }

        $pinjam = Pinjam::join('buku','buku.id_buku','=','pinjambuku.id_buku')
        ->select('pinjambuku.*','buku.nama_buku','buku.penerbit','buku.kode_buku','buku.foto_buku')
        ->where('pinjambuku.id_siswa', $id)
        ->get();

        return view('petugas.pengembalian.pengembalian_cek', compact(['siswa','pinjam']));
    }

    public function proses(Request $request)
    {
        $nominal = $request->nominal;
        $id = $request->id;
        $denda = $request->denda * $nominal;

        $riwayat = Riwayat::find($id);

        $id_buku = $riwayat->id_buku;

        Buku::find($id_buku)->increment('stok_buku');

        Riwayat::find($id)->update([
            'denda'=>$denda,
            'status'=>'selesai',
        ]);


        Pinjam::find($id)->delete();

        return back()->with('success','Berhasil Melakukan Proses Pengembalian Buku');

    }
}
