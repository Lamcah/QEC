<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;

protected $table = 'instruktur';
    protected $fillable = [
        'kode_instruktur',
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
