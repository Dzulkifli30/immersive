<?php

namespace App\Http\Controllers;

use App\Models\Headers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $header = Headers::first();

        return view('admin.landing.header', compact('header'));
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
        //
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
        $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
            'gambar' => 'required',
        ]);
    
        $header = Headers::findOrFail($id);
    
        // Update data lainnya
        if ($request->hasFile('gambar')) {

            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/uploads', $gambar->hashName());

            //delete old image
            // Storage::delete('public/uploads/' . $header->gambar);

            //update product with new image
            $header->update([
                'judul'     => $request->judul,
                'subjudul'   => $request->subjudul,
                'gambar'     => $gambar->hashName()
            ]);
        } else {

            //update product without image
            $header->update([
                'judul'     => $request->judul,
                'subjudul'   => $request->subjudul
            ]);
        }
        return redirect()->route('header.index')->with('success', 'Header updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
