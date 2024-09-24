<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $price = Pricing::all();

        return view('admin.landing.pricing', compact('price'));
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
            'jenis'     => 'required',
            'harga'     => 'required',
            'isi'   => 'required|min:10',
        ]);

        Pricing::create([
            'jenis'     => $request->jenis,
            'harga'     => $request->harga,
            'isi'   => $request->isi,
        ]);

        return redirect()->route('price.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $price = Pricing::findOrFail($id);

        //render view with price
        return view('admin.landing.pricingedit', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis'     => 'required',
            'harga'     => 'required',
            'isi'   => 'required|min:10',
        ]);

        //get product by ID
        $feature = Pricing::findOrFail($id);

        //check if image is uploaded
        $feature->update([
            'jenis'     => $request->jenis,
            'harga'     => $request->harga,
            'isi'   => $request->isi
        ]);

        //redirect to index
        return redirect()->route('price.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
