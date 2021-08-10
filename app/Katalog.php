<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $fillable = [
        'nama'
    ];

    public function buku()
    {
        return $this->hasOne('App\Buku', 'id_katalog');
    }
}
