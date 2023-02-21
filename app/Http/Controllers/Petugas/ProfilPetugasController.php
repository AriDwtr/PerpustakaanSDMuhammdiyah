<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfilPetugasController extends Controller
{
    public function index()
    {
        return view('petugas.profile.profile');
    }

    public function data(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'nama_petugas' => 'required',
            'telp' => 'required',
        ]);

        User::find($id)->update([
            'nip'=>$request->nip,
            'name'=>$request->nama_petugas,
            'telp'=>$request->telp
        ]);

        return back()->with('success', 'Berhasil Memperbaharui Data Profile');
    }

    public function password(Request $request, $id)
    {
        $request->validate([
            'password'=>'required|min:6|same:repassword',
            'repassword'=>'required'
        ]);

        User::find($id)->update([
            'password'=>Hash::make($request->password),
        ]);

        return back()->with('success', 'Berhasil Memperbaharui Password Akun');
    }

    public function foto()
    {
        return view('petugas.profile.profile_foto');
    }

    public function foto_update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'foto'=> 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('fail', 'Maaf Wajib Mengupload Foto Profile Terlebih Dahulu');
        }

        if ($request->hasFile('foto')) {
            $foto_profile = $request->file('foto')->getClientOriginalName();
            $request->foto->move(public_path('foto_petugas'), $foto_profile);
        }

        User::find($id)->update([
            'foto' => $foto_profile
        ]);

        return back()->with('success', 'Berhasil Mengupload Foto');

    }
}
