<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProdukTokoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'harga_jual' => $this->harga_jual,
            'nama_produk' => $this->masterProduk->nama_produk ?? null,
            'jenis_produk' => $this->masterProduk->jenis_produk ?? null,
            'gambar' => $this->masterProduk->gambar ?? null,
            'nama_toko' => $this->toko->nama_toko,
        ];
    }
}
