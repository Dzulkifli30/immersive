<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Usaha;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usaha = Usaha::all();
 
        return view('biodata', compact('usaha'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha'   => 'required|string|max:255',
            'bidang_usaha_id' => 'required',
            'alamat'       => 'required|string',
            'nomor_telpon' => 'required',
            'user_id'      => 'required',
            'gambar.*'     => 'required', // validasi untuk setiap gambar
        ]);
    
        $images = []; // array untuk menyimpan nama gambar
    
        // Periksa apakah ada file gambar yang di-upload
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                // Upload dan simpan file gambar
                $gambar->storeAs('public/uploads', $gambar->hashName());
    
                // Simpan nama file yang di-upload ke array
                $images[] = $gambar->hashName();
            }
        }
        // return dd($request->file('gambar'), json_encode($images), $request->nama_usaha);
    
        // Simpan data ke tabel biodata
        Biodata::create([
            'nama_usaha'   => $request->nama_usaha,
            'bidang_usaha_id' => $request->bidang_usaha_id,
            'alamat'       => $request->alamat,
            'nomor_telpon' => $request->nomor_telpon,
            'user_id'      => $request->user_id, // Mengambil user id dari pengguna yang sedang login
            'gambar'       => json_encode($images), // simpan array gambar sebagai JSON
        ]);
    
        return redirect()->route('dashboard')->with(['success' => 'Data Biodata Berhasil Disimpan!']);
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
        $biodata = Biodata::findOrFail($id);

        //render view with biodata
        return view('costumer.profile', compact('biodata'));
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
