<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function penilaianKerja()
    {
        return $this->hasMany(PenilaianKerja::class); // Ini mengasumsikan bahwa tabel Jabatan memiliki kolom divisi_id
    }
}
