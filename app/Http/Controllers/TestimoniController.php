<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimoni = Testimoni::first()->paginate(5);

        return view('admin.landing.testimoni', compact('testimoni'));
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama'     => 'required',
            'pekerjaan'     => 'required',
            'testi'   => 'required|min:10',
            'foto'     => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/uploads', $foto->hashName());

        Testimoni::create([
            'nama'     => $request->nama,
            'pekerjaan'     => $request->pekerjaan,
            'testi'   => $request->testi,
            'foto'     => $foto->hashName()
        ]);

        return redirect()->route('testimoni.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $testimoni = Testimoni::findOrFail($id);

        //render view with testimoni
        return view('admin.landing.testimoniedit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $request->validate([
            'nama'     => 'required',
            'pekerjaan'     => 'required',
            'testi'   => 'required|min:10',
        ]);

        //get product by ID
        $feature = Testimoni::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('foto')) {

            //upload new image
            $foto = $request->file('foto');
            $foto->storeAs('public/uploads', $foto->hashName());

            //delete old image
            Storage::delete('public/uploads/' . $feature->foto);

            //update product with new image
            $feature->update([
                'nama'     => $request->nama,
                'pekerjaan'     => $request->pekerjaan,
                'testi'   => $request->testi,
                'foto'     => $foto->hashName()
            ]);
        } else {

            //update product without image
            $feature->update([
                'nama'     => $request->nama,
                'pekerjaan'     => $request->pekerjaan,
                'testi'   => $request->testi
            ]);
        }

        //redirect to index
        return redirect()->route('testimoni.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testi = Testimoni::findOrFail($id);

        //delete image
        Storage::delete('public/uploads/' . $testi->image);

        //delete testi
        $testi->delete();

        //redirect to index
        return redirect()->route('testimoni.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
