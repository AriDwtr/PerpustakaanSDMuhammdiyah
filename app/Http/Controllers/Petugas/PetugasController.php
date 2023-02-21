<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $petugas = User::orderBy('name', 'ASC')->get();

     return view('petugas.petugas.petugas', compact(['petugas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.petugas.petugas_store');
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
            'nip' => 'required|unique:users,nip',
            'nama_petugas' => 'required',
            'telp' => 'required',
        ]);

        if ($request->foto == NULL) {
            User::create([
                'nip' => $request->nip,
                'name' => $request->nama_petugas,
                'telp' => $request->telp,
                'password'=>Hash::make('123456789'),
                'type' => 'Petugas',
                'foto' => ''
            ]);

            return to_route('petugas.index')->with('success', 'Berhasil Menambahkan Petugas Baru');
        }

        if ($request->hasFile('foto')) {
            $foto_profile = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_petugas'), $foto_profile);
        }

        User::create([
            'nip' => $request->nip,
            'name' => $request->nama_petugas,
            'telp' => $request->telp,
            'password'=>Hash::make('123456789'),
            'type' => 'Petugas',
            'foto' => $foto_profile
        ]);

        return to_route('petugas.index')->with('success', 'Berhasil Menambahkan Petugas Baru');
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
        $petugas = User::find($id);
        return view('petugas.petugas.petugas_edit', compact(['petugas']));
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
            'nip' => 'required',
            'nama_petugas' => 'required',
            'telp' => 'required',
        ]);

        if ($request->foto == NULL) {
            User::find($id)->update([
                'nip' => $request->nip,
                'name' => $request->nama_petugas,
                'telp' => $request->telp,
            ]);

            return to_route('petugas.index')->with('success', 'Berhasil Memperbaharui Data Petugas');
        }

        if ($request->hasFile('foto')) {
            $foto_profile = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_petugas'), $foto_profile);
        }

        User::find($id)->update([
            'nip' => $request->nip,
            'name' => $request->nama_petugas,
            'telp' => $request->telp,
            'foto' => $foto_profile
        ]);

        return to_route('petugas.index')->with('success', 'Berhasil Memperbaharui Data Petugas');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('success', 'Berhasil Mengapus Petugas');
    }
}
