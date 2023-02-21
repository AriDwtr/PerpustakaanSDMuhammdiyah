<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'nis',
        'barcode',
        'nama_siswa',
        'jenis_kelamin',
        'tgl_lahir',
        'kelas',
        'foto',
        ];
}
