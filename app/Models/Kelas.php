<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kelas',
        'nama_kelas',
        'instruktur_id',
        'biaya_private',
        'biaya_reguler',
    ];

    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class);
    }
}
