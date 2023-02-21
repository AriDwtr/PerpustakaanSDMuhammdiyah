<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::join('kelas','kelas.id_kelas','=','siswa.kelas')
        ->select('siswa.*','kelas.jenis_kelas')
        ->orderBy('siswa.nama_siswa', 'asc')
        ->get();
        return view('petugas.siswa.siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::orderBy('jenis_kelas', 'ASC')->get();
        return view('petugas.siswa.siswa_store', compact(['kelas']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama_siswa' => 'required',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'kelas' => 'required',
        ]);

        $barcode = rand(1,999999999);

        if ($request->foto == NULL) {
            Siswa::create([
                'nis' => $request->nis,
                'barcode' => $barcode,
                'nama_siswa' => $request->nama_siswa,
                'jenis_kelamin' => $request->jk,
                'tgl_lahir' => $request->tgl_lahir,
                'kelas' => $request->kelas,
                'foto' => ''
            ]);

            return to_route('siswa.index')->with('success', 'Berhasil Menambahkan Siswa Baru');
        }

        if ($request->hasFile('foto')) {
            $foto_profile = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_siswa'), $foto_profile);
        }

        Siswa::create([
            'nis' => $request->nis,
            'barcode' => $barcode,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'kelas' => $request->kelas,
            'foto' => $foto_profile
        ]);

        return to_route('siswa.index')->with('success', 'Berhasil Menambahkan Siswa Baru');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::join('kelas','kelas.id_kelas','=','siswa.kelas')
        ->select('siswa.*', 'kelas.jenis_kelas')
        ->find($id);

        // $siswa = Siswa::find($id);

        return view('petugas.siswa.siswa_cetak', compact(['siswa']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        $kelas = Kelas::orderBy('jenis_kelas', 'ASC')->get();
        return view('petugas.siswa.siswa_edit', compact(['siswa','kelas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'kelas' => 'required',
        ]);

        if ($request->foto == NULL) {
            Siswa::find($id)->update([
                'nis' => $request->nis,
                'nama_siswa' => $request->nama_siswa,
                'jenis_kelamin' => $request->jk,
                'tgl_lahir' => $request->tgl_lahir,
                'kelas' => $request->kelas,
            ]);

            return to_route('siswa.index')->with('success', 'Berhasil Memperbaharui Siswa');
        }

        if ($request->hasFile('foto')) {
            $foto_profile = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_siswa'), $foto_profile);
        }

        Siswa::find($id)->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'kelas' => $request->kelas,
            'foto' => $foto_profile
        ]);

        return to_route('siswa.index')->with('success', 'Berhasil Memperbaharui Siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::find($id)->delete();
        return back()->with('success', 'Berhasil Mengapus Siswa');
    }
}
