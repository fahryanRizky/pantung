<?php

namespace App\Models;

use App\Models\ProdukToko;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProduk extends Model
{
    use HasFactory;
    protected $table = 'master_produk';

    protected $fillable = [
        'nama_produk',
        'jenis_produk',
        'status',
        'gambar'
    ];

    public function produkToko()
    {
        return $this->hasMany(ProdukToko::class, 'produk_id');
    }
}
