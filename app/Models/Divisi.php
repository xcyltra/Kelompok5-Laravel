<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jabatans()
    {
        return $this->hasMany(Jabatan::class); // Ini mengasumsikan bahwa tabel Jabatan memiliki kolom divisi_id
    }
}
