<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::first()->paginate(5);
        $kategori = KategoriBerita::all();

        return view('admin.berita', compact('berita', 'kategori'));
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
            'judul'     => 'required',
            'isi'   => 'required|min:10',
            'tanggal'     => 'required',
            'kategori_id'     => 'required',
            'kontributor'     => 'required',
            'gambar'     => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/uploads', $gambar->hashName());

        Berita::create([
            'judul'     => $request->judul,
            'isi'   => $request->isi,
            'tanggal'     => $request->tanggal,
            'kategori_id'     => $request->kategori_id,
            'kontributor'     => $request->kontributor,
            'gambar'     => $gambar->hashName()
        ]);

        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $berita = Berita::findOrFail($id);
        $kategori = KategoriBerita::all();

        //render view with berita
        return view('admin.beritaedit', compact('berita', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $request->validate([
            'judul'     => 'required',
            'isi'   => 'required|min:10',
            'tanggal'     => 'required',
            'kategori_id'     => 'required',
            'kontributor'     => 'required',
        ]);

        //get product by ID
        $feature = Berita::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/uploads', $gambar->hashName());

            //delete old image
            Storage::delete('public/uploads/' . $feature->gambar);

            //update product with new image
            $feature->update([
                'judul'     => $request->judul,
                'isi'     => $request->isi,
                'tanggal'   => $request->tanggal,
                'kategori_id'   => $request->kategori_id,
                'gambar'     => $gambar->hashName()
            ]);
        } else {

            //update product without image
            $feature->update([
                'judul'     => $request->judul,
                'isi'     => $request->isi,
                'tanggal'   => $request->tanggal,
                'kategori_id'   => $request->kategori_id,
            ]);
        }

        //redirect to index
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feature = Berita::findOrFail($id);

        //delete image
        Storage::delete('public/uploads/' . $feature->image);

        //delete feature
        $feature->delete();

        //redirect to index
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
