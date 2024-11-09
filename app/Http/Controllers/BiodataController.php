<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Usaha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $usaha = Usaha::all();

        

        //render view with biodata
        return view('customer.profile', compact('biodata', 'usaha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'   => 'required|string|max:255',
            'nama_usaha'   => 'required|string|max:255',
            'bidang_usaha_id' => 'required',
            'alamat'       => 'required|string',
            'nomor_telpon' => 'required',
        ]);

        $biodata = Biodata::findOrFail($id);
        $user = User::findOrFail($biodata->user_id);

        $biodata->update([
            'nama_usaha'        => $request->nama_usaha,
            'bidang_usaha_id'   => $request->bidang_usaha_id,
            'alamat'            => $request->alamat,
            'nomor_telpon'      => $request->nomor_telpon,
        ]);

        $user->update([
            'name'   => $request->name,
            'email' => $request->email,
        ]);

        return back()->with(['success' => 'Data Biodata Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updategambar(Request $request, string $id)
    {
        $request->validate([
            'gambar.*' => 'required', // Validasi gambar
        ]);

        // Temukan data biodata berdasarkan ID
        $biodata = Biodata::findOrFail($id);

        // Ambil gambar yang sudah ada di database, decode dari JSON menjadi array
        $existingImages = json_decode($biodata->gambar, true) ?? [];

        $newImages = []; // Array untuk menyimpan gambar baru

        // Periksa apakah ada file gambar yang di-upload
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                // Upload gambar dan simpan file di storage
                $gambar->storeAs('public/uploads', $gambar->hashName());

                // Tambahkan nama file baru ke array newImages
                $newImages[] = $gambar->hashName();
            }
        }

        // Gabungkan gambar lama dengan yang baru
        $allImages = array_merge($existingImages, $newImages);

        // Update gambar di database dengan gabungan gambar lama dan baru
        $biodata->update([
            'gambar' => json_encode($allImages),
        ]);

        return back()->with(['success' => 'Berhasil Menambah gambar!']);
    }

    public function hapusgambar(Request $request, string $id)
    {
        $request->validate([
            'gambar' => 'required|string', // Nama gambar yang akan dihapus harus diberikan
        ]);

        // Temukan data biodata berdasarkan ID
        $biodata = Biodata::findOrFail($id);

        // Ambil gambar yang sudah ada di database, decode dari JSON menjadi array
        $existingImages = json_decode($biodata->gambar, true) ?? [];

        // Cek apakah gambar yang akan dihapus ada di array existingImages
        if (($key = array_search($request->gambar, $existingImages)) !== false) {
            // Hapus file gambar dari storage
            Storage::delete('public/uploads/' . $request->gambar);

            // Hapus gambar dari array existingImages
            unset($existingImages[$key]);

            // Update gambar di database setelah dihapus
            $biodata->update([
                'gambar' => json_encode(array_values($existingImages)), // array_values untuk reset index array
            ]);

            return back()->with(['success' => 'Gambar berhasil dihapus!']);
        }

        return back()->with(['error' => 'Gambar tidak ditemukan!']);
    }

    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed', // confirmed akan memverifikasi 'new_password_confirmation'
        ]);

        // Ambil user yang sedang login
        $user = User::findOrFail(Auth::user()->id);

        // Cek apakah password lama cocok
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak sesuai.']);
        }

        // Update password dengan password baru
        $user->update([
            'password'   => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password berhasil diubah!');
    }
}
