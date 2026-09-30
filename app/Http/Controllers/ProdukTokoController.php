<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukTokoRequest;
use App\Http\Resources\ProdukTokoResource;
use App\Models\ProdukToko;

class ProdukTokoController extends Controller
{
    public function index()
    {
        $produkToko = ProdukToko::with('masterProduk','toko')->get();

        return ProdukTokoResource::collection($produkToko);
    }

    public function show($id)
    {
        $produkToko = ProdukToko::findOrFail($id);

        return new ProdukTokoResource($produkToko);
    }

    public function store(ProdukTokoRequest $request, $tokoId, $produkId)
    {
        $validate = $request->validated();

        $produkToko = ProdukToko::create([
            'toko_id' => $tokoId,
            'produk_id' => $produkId,
            'harga_jual' => $validate['harga_jual'],
            'harga_modal_digital' => $validate['harga_modal_digital'] ?? null,
            'status' => 'Aktif',
        ]);

        $produkToko->load(['masterProduk', 'toko']);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data' => new ProdukTokoResource($produkToko)
        ]);

    }
}
