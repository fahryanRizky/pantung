<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';

    protected $fillable = [
        'transaksi_id',
        'produk_toko_id',
        'harga_modal',
        'jumlah',
        'harga_jual',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function produkToko()
    {
        return $this->belongsTo(ProdukToko::class, 'produk_toko_id');
    }

    public function detailTransaksiBatch()
    {
        return $this->hasMany(DetailTransaksiBatch::class, 'detail_transaksi_id');
    }
}
