<?php

namespace App\Http\Controllers;

use App\Http\Requests\BatchRequest;
use App\Http\Resources\BatchResource;
use App\Models\ProdukToko;
use App\Models\Stock;
use Illuminate\Support\Str;

class BatchController extends Controller
{
    public function index($tokoId, $produkId)
    {
        $produkBatch = ProdukToko::where('toko_id', $tokoId)
        ->where('id', $produkId)
        ->with(['masterProduk:id,nama_produk', 'stock.batches'])
        ->firstOrFail();

        $batch = $produkBatch->stock->batches ?? collect();

        return response()->json([
            'produk' => $produkBatch->masterProduk->nama_produk,
            'total_stock' => $produkBatch->total_stock??0,
            'batches' => BatchResource::collection($batch),
        ]);
    }

    public function store(BatchRequest $request, $tokoId, $produkId)
    {
        $produkBatch = ProdukToko::where('toko_id', $tokoId)
        ->where('id', $produkId)
        ->firstOrFail();

        $stock = Stock::firstOrCreate([
            'produk_toko_id' => $produkBatch->id,
        ]);

        $validated = $request->validated();

        $autoBath = 'FRYN-'.now()->format('Ymd').'-'. strtoupper(Str::random(4));

        $batch = $stock->batches()->create([
            'nomor_batch' => $autoBath,
            'jumlah' => $validated['jumlah'],
            'sisa_jumlah' => $validated['jumlah'],
            'harga_modal' => $validated['harga_modal'],
            'tanggal_masuk' => now()->toDateString()
        ]);

        return response()->json([
            'message' => 'Stok berhasil ditambahkan',
            'data' => new BatchResource($batch)
        ]);
    }
}
