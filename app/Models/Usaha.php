<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = 'usaha';

    protected $fillable = ['bidang_usaha'];

    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }

    use HasFactory;
}
