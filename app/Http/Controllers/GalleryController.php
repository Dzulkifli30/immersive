<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

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
        //
    }
}
