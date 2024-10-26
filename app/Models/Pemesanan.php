<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = ['nama_event', 'jadwal_mulai', 'jadwal_berakhir', 'paket_id', 'status', 'total_harga', 'user_id', 'catatan', 'foto', 'metode_pembayaran'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function paket()
    {
        return $this->belongsTo(Pricing::class, 'paket_id', 'id');
    }

    use HasFactory;
}
