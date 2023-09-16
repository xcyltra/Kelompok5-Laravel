<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaNilai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penilaianKerja()
    {
        return $this->hasMany(PenilaianKerja::class); // Ini mengasumsikan bahwa tabel Jabatan memiliki kolom divisi_id
    }
}
