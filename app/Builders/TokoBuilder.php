<?php

namespace App\Builders;
use Illuminate\Database\Eloquent\Builder;

class TokoBuilder extends Builder
{
    public function search(array $filters): self
    {
        return $this
            ->when($filters['search'] ?? null, function ($q, $search) {
                $q->where(fn($sub) => 
                    $sub->where('nama_toko', 'LIKE', "%{$search}%")
                        ->orWhere('alamat', 'LIKE', "%{$search}%")
                );
            })
            ->when($filters['status'] ?? null, fn($q, $status) =>
                $q->where('status', $status)
            );
    }
}
