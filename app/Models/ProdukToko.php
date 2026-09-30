<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukToko extends Model
{
    use HasFactory;
    protected $table = 'produk_toko';

    protected $fillable = [
        'toko_id',
        'produk_id',
        'harga_jual',
        'harga_modal_digital',
        'status'
    ];

    public function masterProduk()
    {
        return $this->belongsTo(MasterProduk::class,'produk_id');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class,'toko_id');
    }

    public function stock()
    {
        return $this->hasOne(Stock::class, 'produk_toko_id');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class,'produk_toko_id');
    }
}
