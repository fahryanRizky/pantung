<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;
    protected $table = 'log_activity';

    protected $fillable = [
        'user_id',
        'transaksi_id',
        'aktivitas',
        'alasan',
        'tanggal_waktu'
    ];

    public function logActivityUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function logActivityTransaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
}
