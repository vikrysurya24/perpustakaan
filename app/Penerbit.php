<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $fillable = [
        'nama_penerbit', 'email', 'telp', 'alamat'
    ];

    public function buku()
    {
        return $this->hasOne('App\Buku', 'id_penerbit');
    }
}
