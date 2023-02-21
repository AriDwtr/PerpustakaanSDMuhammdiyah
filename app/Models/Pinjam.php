<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'pinjambuku';
    protected $primaryKey = 'id_pinjam';
    protected $fillable = [
        'id_siswa',
        'id_buku',
        'tanggal_kembali',
    ];
}
