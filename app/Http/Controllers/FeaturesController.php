<?php

namespace App\Http\Controllers;

use App\Models\Features;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feature = Features::first()->paginate(5);

        return view('admin.landing.features', compact('feature'));
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
            'judul'     => 'required|min:5',
            'isi'   => 'required|min:10',
            'icon'     => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //upload image
        $icon = $request->file('icon');
        $icon->storeAs('public/uploads', $icon->hashName());

        Features::create([
            'judul'     => $request->judul,
            'isi'   => $request->isi,
            'icon'     => $icon->hashName()
        ]);

        return redirect()->route('features.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(string $id): View
    {
        //get feature by ID
        $feature = Features::findOrFail($id);

        //render view with feature
        return view('admin.landing.featuresedit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'judul'     => 'required|min:5',
            'isi'   => 'required|min:10',
        ]);

        //get product by ID
        $feature = Features::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('icon')) {

            //upload new image
            $icon = $request->file('icon');
            $icon->storeAs('public/uploads', $icon->hashName());

            //delete old image
            Storage::delete('public/uploads/' . $feature->icon);

            //update product with new image
            $feature->update([
                'judul'     => $request->judul,
                'isi'   => $request->isi,
                'icon'     => $icon->hashName()
            ]);
        } else {

            //update product without image
            $feature->update([
                'judul'     => $request->judul,
                'isi'   => $request->isi
            ]);
        }

        //redirect to index
        return redirect()->route('features.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get product by ID
        $feature = Features::findOrFail($id);

        //delete image
        Storage::delete('public/uploads/' . $feature->image);

        //delete feature
        $feature->delete();

        //redirect to index
        return redirect()->route('features.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
