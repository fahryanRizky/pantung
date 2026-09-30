<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProdukResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'nama_produk' => $this->nama_produk,
            'jenis_produk' => $this->jenis_produk,
            'status' => $this->status,
            'gambar' => $this->gambar ? Storage::url($this->gambar): null,
        ];
    }
}
