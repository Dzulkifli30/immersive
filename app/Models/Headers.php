<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headers extends Model
{
    protected $fillable = ['judul', 'subjudul', 'gambar'];
    
    use HasFactory;
}
