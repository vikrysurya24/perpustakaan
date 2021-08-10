<?php

use App\Peminjaman;

function total_lewat()
{
    return Peminjaman::where('tgl_kembali', '<', date('Y-m-d'))->where('status', '=', 0)->count();
}

function data_lewat()
{
    $now = date('Y-m-d');
    return Peminjaman::select('*', DB::raw('DATEDIFF("' . $now . '", tgl_kembali) as jumlah_lewat'))
        ->with('anggota')
        ->where('tgl_kembali', '<', date('Y-m-d'))
        ->where('status', '=', 0)
        ->get();
}