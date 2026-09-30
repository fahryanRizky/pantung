<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
        'toko_id',
        'user_id',
        'tanggal_waktu',
        'metode_pembayaran',
        'uang_diterima',
        'bukti_qris',
        'status',
        'nomor_transaksi',
    ];

    public function transaksiUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaksiToko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }

    public function logActivityTransaksi()
    {
        return $this->hasMany(LogActivity::class, 'transaksi_id');
    }
}
