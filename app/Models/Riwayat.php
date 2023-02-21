<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pinjam';
    protected $primaryKey = 'id_riwayat';
    protected $fillable = [
        'id_siswa',
        'id_buku',
        'tanggal_kembali',
        'denda',
        'status',
    ];
}
