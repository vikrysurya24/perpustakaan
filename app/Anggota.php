<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'name', 'sex', 'telp', 'alamat', 'email'
    ];

    public function user()
    {
        return $this->hasOne('App\User', 'id_anggota');
    }
    public function peminjaman()
    {
        return $this->hasMany('App\Peminjaman', 'id_anggota');
    }
}
