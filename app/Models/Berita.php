<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriBerita;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = ['tanggal', 'isi', 'judul', 'kategori_id', 'kontributor', 'gambar'];

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id', 'id');
    }

    use HasFactory;
}
