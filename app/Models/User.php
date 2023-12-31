<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin(){
        return $this->level === 'Admin';
    }

    public function isManager(){
        return $this->level === 'Manager';
    }

    public function isEvaluator(){
        return $this->level === 'Evaluator';
    }

    public function penilaianKerja()
    {
        return $this->hasMany(PenilaianKerja::class); // Ini mengasumsikan bahwa tabel Jabatan memiliki kolom divisi_id
    }
}
