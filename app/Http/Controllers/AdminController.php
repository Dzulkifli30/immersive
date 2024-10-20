<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pesanan()
    {
        $pemesanan = Pemesanan::all();

        return view('admin.tablepemesanan', compact('pemesanan'));

    }
}
