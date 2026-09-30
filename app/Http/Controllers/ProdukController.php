<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdukRequest;
use App\Http\Resources\ProdukResource;
use App\Models\MasterProduk;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
    public function index()
    {
        $produk = MasterProduk::all();

        return ProdukResource::collection($produk);
    }

    public function store(StoreProdukRequest $request)
    {
        $validated = $request->validated();

        $gambar = $request->file('gambar');
        $pathGambar = $gambar->store('produk', 'public');

        $produk = MasterProduk::create([
            'nama_produk' => $validated['nama_produk'],
            'jenis_produk' => $validated['jenis_produk'],
            'status' => 'Aktif',
            'gambar' => $pathGambar,
        ]);

        return response()->json([
            'message' => 'Produk berhasil dibuat',
            'data' => $produk,
        ], 200);
    }

    public function show($id)
    {
        $produk = MasterProduk::findOrFail($id);

        return new ProdukResource($produk);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',
            'jenis_produk' => 'required|in:Fisik,Digital'
        ]);

        $produk = MasterProduk::findOrFail($id);

        $produk-> update([
            'nama_produk' => $validated['nama_produk'],
            'jenis_produk' => $validated['jenis_produk'],
        ]);

        return response()->json([
            'message' => 'Produk berhasil diperbarui',
            'data' => $produk,
        ]);
    }

    public function destroy($id)
    {
        $produk = MasterProduk::findOrFail($id);

        try {
        $produk->delete();

        return response()->json([
            'message' => 'produk berhasil di hapus',
            'data' => $produk
        ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'produk tidak dapat dihapus, karna masih digunakan oleh toko'
            ], 409);
        }
    }

    public function toko($id)
    {
        $produk = MasterProduk::findOrFail($id);

        $produkToko = $produk->produkToko()
        ->where('status', 'Aktif')
        ->get();

        return response()->json([
            'data' => $produkToko,
        ]);
    }

    public function aktif()
    {
        $produkaktif = MasterProduk::where('status', 'Aktif')
        -> get();
        
        return ProdukResource::collection($produkaktif);
    }

    public function filter(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|in:Fisik,Digital'
        ]);
        $produk = MasterProduk::where('jenis_produk',  $validated['jenis'])
        ->get();

        return ProdukResource::collection($produk);
    }
    
    // public function detail($id)
    // {
    //     $produk = MasterProduk::with('produkToko.toko')
    //     ->findOrFail($id);

    //     return response()->json([
    //         'data' => $produk
    //     ]);
    // }
}
