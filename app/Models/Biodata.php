<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';

    protected $fillable = ['nama_usaha', 'bidang_usaha_id', 'alamat', 'nomor_telpon','gambar', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function usaha()
    {
        return $this->belongsTo(Usaha::class, 'bidang_usaha_id', 'id');
    }
    use HasFactory;
}
