<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faq = Faq::first()->paginate(5);

        return view('admin.faqadmin', compact('faq'));
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
            'pertanyaan'     => 'required',
            'isi'     => 'required',
        ]);

        Faq::create([
            'pertanyaan'     => $request->pertanyaan,
            'isi'     => $request->isi,
        ]);

        return redirect()->route('faqs.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $faq = Faq::findOrFail($id);

        //render view with faq
        return view('admin.faqedit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pertanyaan'     => 'required',
            'isi'     => 'required',
        ]);

        //get product by ID
        $faq = Faq::findOrFail($id);

        //check if image is uploaded
        $faq->update([
            'pertanyaan'     => $request->pertanyaan,
            'isi'     => $request->isi,
        ]);

        //redirect to index
        return redirect()->route('faqs.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = Faq::findOrFail($id);

        //delete faq
        $faq->delete();

        //redirect to index
        return redirect()->route('faqs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
