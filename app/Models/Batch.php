<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $table = 'batch';

    protected $fillable = [
        'stock_id',
        'nomor_batch',
        'jumlah',
        'sisa_jumlah',
        'harga_modal',
        'tanggal_masuk'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }

    public function detailTransaksiBatch()
    {
        return $this->hasMany(DetailTransaksiBatch::class, 'batch_id');
    }
}
