<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiBatch extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi_batch';

    protected $fillable = [
        'detail_transaksi_id',
        'batch_id',
        'jumlah',
        'harga_modal'
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function detailTransaksi()
    {
        return $this->belongsTo(DetailTransaksi::class, 'detail_transaksi_id');
    }
}
