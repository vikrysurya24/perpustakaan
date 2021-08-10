<?php

namespace App\Http\Controllers;

use DB;
use App\Buku;
use App\Peminjaman;
use App\DetailPeminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datas = Peminjaman::select('peminjamen.*', DB::raw('DATEDIFF(tgl_kembali,tgl_pinjam) as lama_pinjam'))->with('anggota', 'buku');

        if ($request->status) {
            $status = $request->status == 'belum' ? 0 : 1;
            $datas = $datas->where('status', $status);
        }

        if ($request->tgl) {
            $datas = $datas->where('tgl_pinjam', $request->tgl);
        }

        $datas = $datas->get();

        foreach ($datas as $key => $value) {

            // Total bayar
            $total_bayar = 0;
            foreach ($value->buku as $buku) {
                $total_bayar = $total_bayar + $buku->harga_pinjam;
            }

            $value->total_bayar = 'Rp. ' . number_format($total_bayar * $value->lama_pinjam) . ',-';

            // List buku yang dipinjam
            $value->list_buku = Buku::select('id', 'judul')->orderBy('judul', 'asc')->get();
            $value->buku_dipinjam = DetailPeminjaman::where('id_peminjaman', $value->id)->pluck('id_buku');

            foreach ($value->list_buku as $list) {
                $list->dipinjam = in_array($list->id, $value->buku_dipinjam->toArray());
            }
        }

        $datatables = datatables()->of($datas)->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_anggota' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required'
        ]);

        $peminjaman = new Peminjaman;
        $peminjaman->id_anggota = $request->id_anggota;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->tgl_kembali = $request->tgl_kembali;
        $peminjaman->status = 0;
        $peminjaman->save();

        DetailPeminjaman::where('id_peminjaman', $peminjaman->id)->first();

        $books = $request->buku;
        $buku_save = [];

        foreach ($books as $key => $value) {
            $buku_save[] = [
                'id_peminjaman' => $peminjaman->id,
                'id_buku' => $value,
                'qty' => 1,
            ];

            $get_buku = Buku::find($value);
            $sisa = $get_buku->qty_stok - 1;
            $get_buku->update(['qty_stok' => $sisa]);
        }

        DetailPeminjaman::insert($buku_save);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $this->validate($request, [
            'id_anggota' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required'
        ]);

        $peminjaman->id_anggota = $request->id_anggota;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->tgl_kembali = $request->tgl_kembali;
        $peminjaman->status = $request->status;
        $peminjaman->save();

        DetailPeminjaman::where('id_peminjaman', $peminjaman->id)->delete();

        foreach ($request->buku as $value) {
            $detail = new DetailPeminjaman;
            $detail->id_peminjaman = $peminjaman->id;
            $detail->id_buku = $value;
            $detail->qty = 1;
            $detail->save();

            // Jika status dikembalikan ubah stok + 1
            if ($request->status == 1) {
                $get_buku = Buku::find($value);
                $sisa = $get_buku->qty_stok + 1;
                $get_buku->update(['qty_stok' => $sisa]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        DetailPeminjaman::where('id_peminjaman', $peminjaman->id)->delete();
        $peminjaman->delete();
    }
}
