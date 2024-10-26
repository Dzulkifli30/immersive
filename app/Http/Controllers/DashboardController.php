<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Faq;
use App\Models\Features;
use App\Models\Gallery;
use App\Models\Headers;
use App\Models\KategoriBerita;
use App\Models\Pricing;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index() {
        $header = Headers::first();
        $feature = Features::latest()->paginate(10);
        $tester = Testimoni::all();
        $price = Pricing::all();

        return view('home', compact('header', 'feature', 'tester', 'price'));
    }

    public function faq() {
        $faq = Faq::all();

        return view('faq', compact('faq'));
    }

    public function news(Request $request) {
        // $kategori = KategoriBerita::all();
        $query = $request->input('query');
        
        if ($query) {
            $news = Berita::where('judul', 'like', '%' . $query . '%')->get();
        } else {
            $news = Berita::latest()->paginate(5);
        }

        $terbaru = Berita::latest()->paginate(3);
        $kategori = KategoriBerita::all();

        return view('news', compact('news', 'terbaru', 'kategori'));
    }

    public function gallery() {
        $gallery = Gallery::all();

        return view('gallery', compact('gallery'));
    }

    public function shownews(string $id)
    {
        $berita = Berita::findOrFail($id);
        
        return view('shownews', compact('berita'));
    }

    public function searchfaq(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            $faq = Faq::where('pertanyaan', 'like', '%' . $query . '%')->get();
        } else {
            $faq = Faq::all();
        }

        return view('faq', ['faq' => $faq]);
    }

    public function kategorinews(string $id)
    {
        $news = Berita::where('kategori_id', '=', $id)->paginate(5);

        $terbaru = Berita::latest()->paginate(3);
        $kategori = KategoriBerita::all();

        return view('news', compact('news', 'terbaru', 'kategori'));
    }
}
