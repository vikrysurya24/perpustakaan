<?php

namespace App\Http\Controllers;

use DB;
use App\Buku;
use App\Peminjaman;
use App\DetailPeminjaman;
use App\Anggota;
use App\Penerbit;
use App\Pengarang;
use App\Katalog;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function buku()
    {
        return Buku::all();
    }

    public function peminjaman()
    {
        Peminjaman::query()->with(array(
            'anggota' => function ($query) {
                $query->select('id', 'telp', 'alamat');
            },
            'buku' => function ($query) {
                $query->select('isbn', 'qty', 'judul');
            }

        ))->get();

        $peminjaman = Peminjaman::with('anggota:id,telp,alamat', 'buku:isbn,qty_stok,judul')->get();

        foreach ($peminjaman as $key => $value) {

            $list_buku = Buku::select('id', 'id_pengarang', 'id_penerbit', 'id_katalog')->limit(12)->orderBy('id', 'desc')->get();

            foreach ($list_buku as $list) {
                $value->penerbit = Penerbit::select('nama_penerbit')->where('id', $list->id_penerbit)->first();
                $value->pengarang = Pengarang::select('nama_pengarang')->where('id', $list->id_pengarang)->first();
                $value->katalog = Katalog::select('nama as nama_katalog')->where('id', $list->id_katalog)->first();
            }
        }
        return $peminjaman;
    }

    public function anggota()
    {
        return Anggota::whereDoesntHave('user')->get();
    }
}
