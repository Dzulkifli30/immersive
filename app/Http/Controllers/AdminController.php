<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function pesanan(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            $pemesanan = Pemesanan::where('nama_event', 'like', '%' . $query . '%')->paginate(5);
        } else {
            $pemesanan = Pemesanan::latest()->paginate(5);
        }
        return view('admin.pemesananuser', compact('pemesanan'));
    }

    public function pesananedit(string $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        return view('admin.editpemesanan', compact('pemesanan'));
    }

    public function pesananstatus(Request $request, string $id)
    {
        $request->validate([
            'status'            => 'required',
            'catatan'          => 'required',
            'foto.*'       => 'required',
        ]);

        $images = [];

        $pemesanan = Pemesanan::findOrFail($id);

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                // Upload dan simpan file foto
                $foto->storeAs('public/uploads', $foto->hashName());
    
                // Simpan nama file yang di-upload ke array
                $images[] = $foto->hashName();
            }

            $pemesanan->update([
                'status'     => $request->status,
                'catatan'     => $request->catatan,
                'foto'     => json_encode($images),
            ]);
        } else {
            $pemesanan->update([
                'status'     => $request->status,
                'catatan'     => $request->catatan,
            ]);
        }

        //redirect to index
        return redirect()->route('admin.pesanan')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function updategambar(Request $request, string $id)
    {
        $request->validate([
            'foto.*' => 'required', // Validasi foto
        ]);

        // Temukan data biodata berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($id);

        // Ambil foto yang sudah ada di database, decode dari JSON menjadi array
        $existingImages = json_decode($pemesanan->foto, true) ?? [];

        $newImages = []; // Array untuk menyimpan foto baru

        // Periksa apakah ada file foto yang di-upload
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                // Upload foto dan simpan file di storage
                $foto->storeAs('public/uploads', $foto->hashName());

                // Tambahkan nama file baru ke array newImages
                $newImages[] = $foto->hashName();
            }
        }

        // Gabungkan foto lama dengan yang baru
        $allImages = array_merge($existingImages, $newImages);

        // Update foto di database dengan gabungan foto lama dan baru
        $pemesanan->update([
            'foto' => json_encode($allImages),
        ]);

        return back()->with(['success' => 'Berhasil Menambah foto!']);
    }

    public function hapusgambar(Request $request, string $id)
    {
        $request->validate([
            'foto' => 'required|string', // Nama foto yang akan dihapus harus diberikan
        ]);

        // Temukan data biodata berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($id);

        // Ambil foto yang sudah ada di database, decode dari JSON menjadi array
        $existingImages = json_decode($pemesanan->foto, true) ?? [];

        // Cek apakah foto yang akan dihapus ada di array existingImages
        if (($key = array_search($request->foto, $existingImages)) !== false) {
            // Hapus file foto dari storage
            Storage::delete('public/uploads/' . $request->foto);

            // Hapus foto dari array existingImages
            unset($existingImages[$key]);

            // Update foto di database setelah dihapus
            $pemesanan->update([
                'foto' => json_encode(array_values($existingImages)), // array_values untuk reset index array
            ]);

            return back()->with(['success' => 'Gambar berhasil dihapus!']);
        }

        return back()->with(['error' => 'Gambar tidak ditemukan!']);
    }

    public function hapuspemesanan(string $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $existingImages = json_decode($pemesanan->foto, true) ?? [];

        // Hapus semua file images dari storage
        foreach ($existingImages as $image) {
            Storage::delete('public/uploads/' . $image);
        }
        //delete peme$pemesanan
        $pemesanan->delete();

        //redirect to index
        return redirect()->route('admin.pemesanan')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
