@extends('layouts.landing')

@section('title')
Tentang - Immersive
@endsection

@section('content')
@include('components.nav')

<!-- Header -->
<header id="header" class="header py-20 text-center">
</header> <!-- end of header -->
<!-- end of header -->
<div class="w-full px-4 mx-auto flex justify-center">
    <div class="max-w-3xl p-6">
        <div class="pb-8">
            <a href="{{route('landing.news')}}">
                <p class="font-light text-lg hover:underline text-gray-700 hover:text-black"><i class="fa fa-arrow-left text-base pr-1" aria-hidden="true"></i>Kembali</p>
            </a>
        </div>
        <div>
            <h5 class="mb-10 text-4xl font-bold tracking-tight text-gray-900">{{ $berita->judul}}</h5>
        </div>
        <div class="flex justify-between items-center">
            <div class="flex gap-3">
                <div class="w-16 h-16">
                    <img class="w-full h-full rounded-full" src="{{ asset('images/profil_kosong.jpg') }}" alt="">
                </div>
                <div class="">
                    <p class="font-bold text-black text-lg">{{ $berita->kontributor }}</p>
                    <p class="font-bold text-sm">{{ $berita->kategori->nama }}</p>
                    <p class="font-thin text-xs">{{ $berita->tanggal }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <p class="text-sm text-black font-medium">Bagikan</p>
                <div class="w-14 h-14 rounded-full bg-slate-200 justify-center items-center flex">
                    <i class="fa fa-share-alt text-gray-600 text-xl " aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="py-6">
            <img class="rounded-lg w-full" src="{{ $berita->gambar ? asset('/storage/uploads/'.$berita->gambar) : asset('images/jade.jpg') }}" alt="jade" />
        </div>
        @foreach (explode("\n", $berita->isi) as $paragraph)
        <p class="mb-3 font-normal text-gray-700 text-justify">
            {{ $paragraph }}
        </p>
        @endforeach
    </div>
</div>

@endsection