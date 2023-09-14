<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id'); // Gantilah 'divisi_id' dengan nama kolom yang sesuai dalam tabel Jabatan
    }
}
