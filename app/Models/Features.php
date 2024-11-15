<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $fillable = ['judul', 'isi', 'icon'];

    use HasFactory;
}
