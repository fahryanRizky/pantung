<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TokoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'nama_toko' => $this->nama_toko,
            'alamat' => $this->alamat,
            'status' =>$this->status,
        ];
    }
}
