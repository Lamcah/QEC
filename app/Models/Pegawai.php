<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

protected $table = 'pegawai';
    protected $fillable = [
        'kode_pegawai',
        'nama',
        'email',
        'jenis_kelamin',
        'jabatan',
        'honor',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'nomor_telepon',
        'pendidikan_terakhir',
        'tanggal_masuk',
        'foto',
    ];
}
