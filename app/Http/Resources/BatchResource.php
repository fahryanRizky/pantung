<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BatchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nomor_batch' => $this->nomor_batch,
            'jumlah' => $this->jumlah,
            'sisa_jumlah' => $this->sisa_jumlah,
            'harga_modal' => $this->harga_modal,
            'tanggal_masuk' => $this->tanggal_masuk
        ];
    }
}
