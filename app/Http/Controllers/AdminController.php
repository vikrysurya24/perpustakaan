<?php

namespace App\Http\Controllers;

use DB;
use App\Anggota;
use App\Peminjaman;
use App\Penerbit;
use App\Katalog;
use App\Buku;
use App\Pengarang;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Total
        $total_anggota = Anggota::count();
        $total_buku = Buku::count();
        $total_peminjaman = Peminjaman::whereMonth('tgl_pinjam', date('m'))->count();
        $total_penerbit = Penerbit::count();

        // Chart Penerbit
        $data_donut = Buku::select(DB::raw('COUNT(id_penerbit) AS total'))->groupBy('id_penerbit')->orderBy('id_penerbit', 'asc')->pluck('total');
        $label_donut = Penerbit::orderBy('penerbits.id', 'asc')->join('bukus', 'bukus.id_penerbit', '=', 'penerbits.id')->groupBy('nama_penerbit')->pluck('nama_penerbit');

        // Chart Peminjaman
        $label_bar = ['Peminjaman', 'Pengembalian'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = $key == 0 ? 'rgba(60, 141, 188, 0.9)' : 'rgba(210, 214, 222, 1)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                if ($key == 0) {
                    $data_month[] = Peminjaman::select(DB::raw('COUNT(*) AS total'))->whereMonth('tgl_pinjam', $month)->first()->total;
                } else {
                    $data_month[] = Peminjaman::select(DB::raw('COUNT(*) AS total'))->whereMonth('tgl_kembali', $month)->first()->total;
                }
            }

            $data_bar[$key]['data'] = $data_month;
        }

        return view('admin.dashboard', compact('total_buku', 'total_anggota', 'total_peminjaman', 'total_penerbit', 'data_donut', 'label_donut', 'data_bar'));
    }

    public function katalog()
    {
        $data_katalog = Katalog::all();
        return view('admin.katalog.katalog', compact('data_katalog'));
    }

    public function penerbit()
    {
        $data_penerbit = Penerbit::all();

        return view('admin.penerbit');
    }

    public function pengarang()
    {
        $data_pengarang = Pengarang::all();

        return view('admin.pengarang.pengarang', compact('data_pengarang'));
    }

    public function anggota()
    {
        $data_anggota = Anggota::all();

        return view('admin.anggota');
    }

    public function buku()
    {
        $data['penerbit'] = Penerbit::all();
        $data['pengarang'] = Pengarang::all();
        $data['katalog'] = Katalog::all();

        return view('admin.buku', compact('data'));
    }

    public function peminjaman()
    {
        $data['buku'] = Buku::orderBy('judul', 'asc')->where('qty_stok', '>', 0)->get();
        $data['anggota'] = Anggota::orderBy('name', 'asc')->where('id', '>', 1)->get();
        return view('admin.peminjaman', compact('data'));
    }
}
