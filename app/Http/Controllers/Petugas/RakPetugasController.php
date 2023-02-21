<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RakPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rak = Rak::orderBy('jenis_rak','ASC')->paginate(8);
        return view('petugas.rak.rak', compact(['rak']));
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
        $validator = Validator::make($request->all(), [
            'jenis_rak'=> 'unique:rak,jenis_rak'
        ]);

        if ($validator->fails()) {
            return back()->with('fail', 'Rak Buku Telah Ada Mohon Cek Ulang');
        }

        rak::create([
            'jenis_rak'=>$request->jenis_rak,
        ]);

        return back()->with('success', 'Berhasil Menambahkan Rak Buku Baru');
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
        Rak::find($id)->update([
            'jenis_rak'=>$request->jenis_rak
        ]);

        return back()->with('success', 'Berhasil Perbaharui Rak Buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rak::find($id)->delete();

        return back()->with('success', 'Berhasil Menghapus Rak Buku');
    }
}
