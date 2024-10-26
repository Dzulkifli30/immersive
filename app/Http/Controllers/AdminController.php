<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

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

}
