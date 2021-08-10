<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Buku::all();

        $data = Buku::limit(9)->orderBy('id', 'desc')->get();

        return json_encode($data);
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
            'isbn' => 'required',
            'judul' => 'required',
            'tahun' => 'required',
            'id_penerbit' => 'required',
            'id_pengarang' => 'required',
            'id_katalog' => 'required',
            'qty_stok' => 'required',
            'harga_pinjam' => 'required',
        ]);

        $buku = new Buku;
        $buku->isbn = $request->isbn;
        $buku->judul = $request->judul;
        $buku->tahun = $request->tahun;
        $buku->id_penerbit = $request->id_penerbit;
        $buku->id_pengarang = $request->id_pengarang;
        $buku->id_katalog = $request->id_katalog;
        $buku->qty_stok = $request->qty_stok;
        $buku->harga_pinjam = $request->harga_pinjam;

        $buku->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $this->validate($request, [
            'isbn' => 'required',
            'judul' => 'required',
            'tahun' => 'required',
            'id_penerbit' => 'required',
            'id_pengarang' => 'required',
            'id_katalog' => 'required',
            'qty_stok' => 'required',
            'harga_pinjam' => 'required',
        ]);

        $buku = new Buku;
        $buku->isbn = $request->isbn;
        $buku->judul = $request->judul;
        $buku->tahun = $request->tahun;
        $buku->id_penerbit = $request->id_penerbit;
        $buku->id_pengarang = $request->id_pengarang;
        $buku->id_katalog = $request->id_katalog;
        $buku->qty_stok = $request->qty_stok;
        $buku->harga_pinjam = $request->harga_pinjam;

        $buku->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return back();
    }
}
