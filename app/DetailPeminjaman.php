<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    protected $table = 'detail_peminjamen';

    protected $fillable = [
        'id_peminjaman', 'id_buku', 'qty'
    ];
}
