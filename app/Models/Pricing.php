<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = 'pricing';

    protected $fillable = ['jenis', 'harga', 'isi'];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    use HasFactory;
}
