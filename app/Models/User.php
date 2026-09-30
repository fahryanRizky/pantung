<?php

namespace App\Models;
use App\Models\Toko;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory, Notifiable;
    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'password',
        'no_hp',
        'role',
        'kode_karyawan',
        'toko_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function tokoDimiliki()
    {
        return $this->hasMany(Toko::class, 'user_id');
    }

    public function tokoTempatBekerja()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }

    public function transaksiUser()
    {
        return $this->hasMany(Transaksi::class, 'user_id');
    }

    public function logActivityUser()
    {
        return $this->hasMany(LogActivity::class, 'user_id');
    }
}


// | Relasi             | Cara berpikir                                       |
// | ------------------ | --------------------------------------------------- |
// | `belongsTo()`      | **Saya milik siapa?**                               |
// | `hasOne()`         | **Saya punya satu apa?**                            |
// | `hasMany()`        | **Saya punya banyak apa?**                          |
// | `belongsToMany()`  | **Saya terhubung banyak ↔ banyak dengan siapa?**    |
// | `hasOneThrough()`  | **Saya punya satu melalui siapa?**                  |
// | `hasManyThrough()` | **Saya punya banyak melalui siapa?**                |
// | `morphOne()`       | **Saya punya satu relasi polymorphic**              |
// | `morphMany()`      | **Saya punya banyak relasi polymorphic**            |
// | `morphTo()`        | **Saya dimiliki oleh model polymorphic yang mana?** |

