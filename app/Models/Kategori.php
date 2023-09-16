<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penilaianKerja()
    {
        return $this->hasMany(PenilaianKerja::class, 'kategori_id');
    }
}
