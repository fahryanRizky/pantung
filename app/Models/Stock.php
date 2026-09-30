<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';

    protected $fillable =[
        'produk_toko_id',
    ];

    public function produkToko()
    {
        return $this->belongsTo(ProdukToko::class, 'produk_toko_id');
    }

    public function batches()
    {
        return $this->hasMany(Batch::class, 'stock_id');
    }
}
