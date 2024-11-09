<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::latest()->paginate(5);

        return view('admin.gallery', compact('gallery'));
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
            'customer'            => 'required',
            'deskripsi'          => 'required',
            'foto.'       => 'required',
        ]);

        $images = [];

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                // Upload dan simpan file foto
                $foto->storeAs('public/uploads', $foto->hashName());

                // Simpan nama file yang di-upload ke array
                $images[] = $foto->hashName();
            }
        }

        Gallery::create([
            'customer'      => $request->customer,
            'deskripsi'     => $request->deskripsi,
            'images'        => json_encode($images),
        ]);

        return redirect()->route('gallerys.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $gallery = Gallery::findOrFail($id);

        //render view with gallery
        return view('admin.galleryedit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'customer'     => 'required',
            'deskripsi'     => 'required',
        ]);

        $gallery = Gallery::findOrFail($id);

        $gallery->update([
            'customer'     => $request->customer,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('gallery.index')->with(['success' => 'Data Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $existingImages = json_decode($gallery->images, true) ?? [];

        // Hapus semua file images dari storage
        foreach ($existingImages as $image) {
            Storage::delete('public/uploads/' . $image);
        }
        //delete gallery
        $gallery->delete();

        //redirect to index
        return redirect()->route('gallerys.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function updategambar(Request $request, string $id)
    {
        $request->validate([
            'images.*' => 'required', // Validasi images
        ]);

        // Temukan data biodata berdasarkan ID
        $gallery = Gallery::findOrFail($id);

        // Ambil images yang sudah ada di database, decode dari JSON menjadi array
        $existingImages = json_decode($gallery->images, true) ?? [];

        $newImages = []; // Array untuk menyimpan images baru

        // Periksa apakah ada file images yang di-upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $images) {
                // Upload images dan simpan file di storage
                $images->storeAs('public/uploads', $images->hashName());

                // Tambahkan nama file baru ke array newImages
                $newImages[] = $images->hashName();
            }
        }

        // Gabungkan images lama dengan yang baru
        $allImages = array_merge($existingImages, $newImages);

        // Update images di database dengan gabungan images lama dan baru
        $gallery->update([
            'images' => json_encode($allImages),
        ]);

        return back()->with(['success' => 'Berhasil Menambah images!']);
    }

    public function hapusgambar(Request $request, string $id)
    {
        $request->validate([
            'images' => 'required|string', // Nama images yang akan dihapus harus diberikan
        ]);

        // Temukan data biodata berdasarkan ID
        $gallery = Gallery::findOrFail($id);

        // Ambil images yang sudah ada di database, decode dari JSON menjadi array
        $existingImages = json_decode($gallery->images, true) ?? [];

        // Cek apakah images yang akan dihapus ada di array existingImages
        if (($key = array_search($request->images, $existingImages)) !== false) {
            // Hapus file images dari storage
            Storage::delete('public/uploads/' . $request->images);

            // Hapus images dari array existingImages
            unset($existingImages[$key]);

            // Update images di database setelah dihapus
            $gallery->update([
                'images' => json_encode(array_values($existingImages)), // array_values untuk reset index array
            ]);

            return back()->with(['success' => 'Gambar berhasil dihapus!']);
        }

        return back()->with(['error' => 'Gambar tidak ditemukan!']);
    }
}
