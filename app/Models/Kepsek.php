<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepsek extends Model
{
    use HasFactory;
    protected $table = 'kepala_sekolah';
    protected $primaryKey = 'id_kepsek';
    protected $fillable = [
        'nip_kepsek',
        'nama_kepsek',
        'jenis_kelamin_kepsek',
        'tgl_lahir_kepsek',
        'foto_kepsek',
    ];
}
