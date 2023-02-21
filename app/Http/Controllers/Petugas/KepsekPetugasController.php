<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Kepsek;
use Illuminate\Http\Request;

class KepsekPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepsek = Kepsek::get();
        return view('petugas.kepsek.kepsek', compact(['kepsek']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('foto_kepsek')) {
            $foto_kepsek_profile = $request->file('foto_kepsek')->getClientOriginalName();
            $request->foto_kepsek->move(public_path('foto_kepsek'), $foto_kepsek_profile);
        }

        Kepsek::create([
            'nip_kepsek' => $request->nip_kepsek,
            'nama_kepsek' => $request->nama_kepsek,
            'jenis_kelamin_kepsek' => $request->jenis_kelamin_kepsek,
            'tgl_lahir_kepsek' => $request->tgl_lahir_kepsek,
            'foto_kepsek' => $foto_kepsek_profile,
        ]);

        return back()->with('success', 'Berhasil Menambahkan Data Kepala sekolah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if ($request->foto_kepsek == NULL) {
            Kepsek::find($id)->update([
                'nip_kepsek' => $request->nip_kepsek,
                'nama_kepsek' => $request->nama_kepsek,
                'jenis_kelamin_kepsek' => $request->jenis_kelamin_kepsek,
                'tgl_lahir_kepsek' => $request->tgl_lahir_kepsek,
            ]);

            return back()->with('success', 'Berhasil Memperbaharui Data Kepala Sekolah');
        }


        if ($request->hasFile('foto_kepsek')) {
            $foto_kepsek_profile = $request->file('foto_kepsek')->getClientOriginalName();
            $request->foto_kepsek->move(public_path('foto_kepsek'), $foto_kepsek_profile);
        }

        Kepsek::find($id)->update([
            'nip_kepsek' => $request->nip_kepsek,
            'nama_kepsek' => $request->nama_kepsek,
            'jenis_kelamin_kepsek' => $request->jenis_kelamin_kepsek,
            'tgl_lahir_kepsek' => $request->tgl_lahir_kepsek,
            'foto_kepsek' => $foto_kepsek_profile,
        ]);

        return back()->with('success', 'Berhasil Memperbaharui Data Kepala Sekolah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kepsek::find($id)->delete();
        return back()->with('success', 'Berhasil Menghapus Data Kepala Sekolah');
    }
}
