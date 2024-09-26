<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Faq;
use App\Models\Features;
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

    public function news() {
        // $kategori = KategoriBerita::all();

        $news = Berita::all();
        $terbaru = Berita::latest()->paginate(3);

        return view('news', compact('news', 'terbaru'));
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

    public function searchnews(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            $news = Berita::where('judul', 'like', '%' . $query . '%')->get();
        } else {
            $news = Berita::all();
        }

        return view('news', ['news' => $news]);
    }
}
