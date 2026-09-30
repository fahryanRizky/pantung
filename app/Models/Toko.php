<?php

namespace App\Models;

use App\Builders\TokoBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'toko';

    protected $fillable = [
    'nama_toko',
    'alamat',
    'status',
    'user_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function karyawan()
    {
        return $this->hasMany(User::class, 'toko_id');
    }

    public function produkToko()
    {
        return $this->hasMany(ProdukToko::class, 'toko_id');
    }

    public function transaksiToko()
    {
        return $this->hasMany(Transaksi::class, 'toko_id');
    }

    public function newEloquentBuilder($query)
    {
        return new TokoBuilder($query);
    }
}
