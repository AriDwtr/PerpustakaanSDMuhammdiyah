<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Riwayat;
use Illuminate\Http\Request;

use PDF;

class LaporanPetugasController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::join('siswa', 'siswa.id_siswa', '=', 'riwayat_pinjam.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.kelas')
            ->join('buku', 'buku.id_buku', '=', 'riwayat_pinjam.id_buku')
            ->select('riwayat_pinjam.*', 'buku.nama_buku', 'buku.kode_buku', 'buku.foto_buku', 'siswa.nis', 'siswa.nama_siswa', 'kelas.jenis_kelas')
            ->latest()
            ->get();

        return view('petugas.laporan.laporan', compact(['riwayat']));
    }

    public function cetak_pdf()
    {
        $riwayat = Riwayat::join('siswa', 'siswa.id_siswa', '=', 'riwayat_pinjam.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.kelas')
            ->join('buku', 'buku.id_buku', '=', 'riwayat_pinjam.id_buku')
            ->select('riwayat_pinjam.*', 'buku.nama_buku', 'buku.kode_buku', 'buku.foto_buku', 'siswa.nis', 'siswa.nama_siswa', 'kelas.jenis_kelas')
            ->latest()
            ->get();

        $pdf = PDF::loadview('petugas.laporan.print_laporan_all', ['riwayat' => $riwayat]);

        return $pdf->stream();
    }

    public function cari_laporan(Request $request)
    {
        $data = explode(' - ', $request->daterange);

        $startDate = date('Y-m-d', strtotime($data[0]));
        $endDate = date('Y-m-d', strtotime($data[1]));

        $riwayat = Riwayat::join('siswa', 'siswa.id_siswa', '=', 'riwayat_pinjam.id_siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.kelas')
            ->join('buku', 'buku.id_buku', '=', 'riwayat_pinjam.id_buku')
            ->select('riwayat_pinjam.*', 'buku.nama_buku', 'buku.kode_buku', 'buku.foto_buku', 'siswa.nis', 'siswa.nama_siswa', 'kelas.jenis_kelas')
            ->whereBetween('riwayat_pinjam.tanggal_kembali', [$startDate, $endDate])
            ->get();

        $pdf = PDF::loadview('petugas.laporan.print_laporan_all', ['riwayat' => $riwayat]);
        return $pdf->stream();
    }
}
