<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::where('user_id', '=', Auth::user()->id)->paginate(5);
        $pricing = Pricing::all();
        
        return view('customer.tablepemesanan', compact('pemesanan', 'pricing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_event'        => 'required',
            'jadwal_mulai'      => 'required',
            'jadwal_berakhir'   => 'required',
            'paket_id'             => 'required',
            'user_id'           => 'required',
        ]);

        $jadwalMulai = $request->jadwal_mulai;
        $jadwalBerakhir = $request->jadwal_berakhir;
        $paket_id = $request->paket_id;

        $harga_paket = Pricing::find($paket_id)->harga;
        // Hitung jumlah hari
        $jumlahHari = \Carbon\Carbon::parse($jadwalMulai)->diffInDays(\Carbon\Carbon::parse($jadwalBerakhir)) + 1;
        $harga = $jumlahHari * $harga_paket;

        Pemesanan::create([
            'nama_event'            => $request->nama_event,
            'jadwal_mulai'         => $request->jadwal_mulai,
            'jadwal_berakhir'      => $request->jadwal_berakhir,
            'paket_id'                 => $paket_id,
            'status'                 => 0,
            'total_harga'           => $harga,
            'user_id'               => $request->user_id,
        ]);

        return redirect()->route('pemesanan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
