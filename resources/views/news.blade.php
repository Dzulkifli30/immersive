@extends('layouts.landing')

@section('title')
Berita - Immersive
@endsection

@section('content')
@include('components.nav')

<!-- Header -->
<header id="header" class="header py-28 text-center md:pt-4 xl:pt-10 xl:pb-4">
    <div class="container px-4 sm:px-8">
        <div class="mb-4 lg:mt-32 xl:mt-40 xl:mr-12">
            <h1 class="h1-large mb-5 ml-10">Berita</h1>
        </div>
    </div> <!-- end of container -->
</header> <!-- end of header -->
<!-- end of header -->

<!-- search -->
<div class="w-full pb-6 lg:pb-20 flex flex-col items-center">
    <form class="max-w-sm lg:max-w-screen-lg w-full" method="GET" action="{{ route('search.news') }}">
        <div class="relative">
            <input type="search" name="query" id="default-search"
                class="block w-full p-4 ps-10 text-md text-black border border-black rounded-lg"
                placeholder="Cari pertanyaan" required />
            <button type="submit"
                class="text-black absolute end-2.5 bottom-2.5 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-lg py-1 pr-4 ">
                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M16.65 16.65A7.45 7.45 0 1110.2 3.8a7.45 7.45 0 016.45 12.85z" />
                </svg>
            </button>
        </div>
    </form>
</div>

<!-- kategori -->
<div id="kategori" class="w-full px-4 pb-16 flex justify-center mx-auto space-x-3">
    <button class="btn px-4 py-2 rounded-full border-sky-400 border bg-white text-gray-800 font-semibold" id="btn1" onclick="filterNews('all')">all</button>
    <button class="btn px-4 py-2 rounded-full border-sky-400 border bg-sky-500 text-white font-semibold" id="btn2" onclick="filterNews('pendidikan')">Pendidikan</button>
    <button class="btn px-4 py-2 rounded-full border-sky-400 border bg-sky-500 text-white font-semibold" id="btn3" onclick="filterNews('teknologi')">Teknologi</button>
    <button class="btn px-4 py-2 rounded-full border-sky-400 border bg-sky-500 text-white font-semibold" id="btn4" onclick="filterNews('sejarah')">Sejarah</button>
</div>

<div id="news" class="w-full px-4 md:px-10 xl:px-28 flex justify-between items-start">

    <!-- Card -->
    <div class="w-4/6 flex flex-col gap-6" id="news-list">
        @foreach ($news as $data)
        <div class="news-item space-y-6" data-category="{{ $data->kategori->nama }}">
            <a href="{{ route('show.news', $data->id) }}" class="w-full bg-white rounded-lg flex">
                <div class="w-1/3">
                    <img class="rounded-lg w-full" src="{{ $data->gambar ? asset('/storage/uploads/'.$data->gambar) : asset('images/jade.jpg') }}" alt="jade" />
                </div>
                <div class="px-5 py-1 w-2/3 space-y-2">
                    <div>
                        <h5 class="text-xl font-bold tracking-tight text-gray-900 hover:text-blue-500 line-clamp-2">{{ $data->judul }}</h5>
                    </div>
                    <p class="font-normal text-gray-700 line-clamp-3">{{ $data->isi}}</p>
                    <p class="font-thin text-sm"><i class="fa fa-calendar text-black pr-2" aria-hidden="true"></i>{{ $data->tanggal}} - {{ $data->kategori->nama}}</p>
                </div>
            </a>
            <hr class="w-full border-3 border-gray-800">
        </div>
        @endforeach
        <!-- row 1 -->
    </div>
    <!-- end of card -->

    <!-- Card -->
    <div class="w-1/4 flex flex-col gap-3">
        <div class="bg-white">
            <div class="p-5">
                <p class="text-lg font-bold tracking-tight text-gray-900">berita terbaru</p>
            </div>
            <hr class="w-full border-3 border-gray-800">
            @foreach ($terbaru as $latest)
            <a href="{{ route('show.news', $data->id) }}">
                <div class="p-5 flex space-x-2">
                    <div class="w-1/3">
                        <img class="rounded-lg w-full h-24" src="{{ $latest->gambar ? asset('/storage/uploads/'.$latest->gambar) : asset('images/jade.jpg') }}" alt="jade">
                    </div>
                    <div class="w-2/3">
                        <p class="mb-1 font-bold text-base text-gray-700 line-clamp-2">{{ $latest->judul }}</p>
                        <div class="flex space-x-1">
                            <i class="fa fa-calendar text-black text-sm" aria-hidden="true"></i>
                            <p class="mb-1 font-light text-sm">{{ $latest->tanggal}}</p>
                        </div>
                    </div>
                </div>
            </a>
            <div class="px-3">
                <hr class="w-full border-3 border-gray-800">
            </div>
            @endforeach
        </div>
    </div>
    <!-- end of card -->
</div>
<script>
    const buttons = document.querySelectorAll('.btn');

    // Fungsi untuk mereset semua tombol ke biru dan mengubah yang diklik menjadi merah
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Reset warna semua tombol menjadi biru
            buttons.forEach(btn => btn.classList.replace('bg-white', 'bg-sky-500'));
            buttons.forEach(btn => btn.classList.replace('text-gray-800', 'text-white'));

            // Ubah tombol yang diklik menjadi merah
            button.classList.replace('bg-sky-500', 'bg-white');
            button.classList.replace('text-white', 'text-gray-800');
        });
    });

    function filterNews(category) {
        // Ambil semua elemen berita
        const newsItems = document.querySelectorAll('.news-item');

        // Loop melalui semua item berita dan filter berdasarkan kategori
        newsItems.forEach(item => {
            const newsCategory = item.getAttribute('data-category');

            // Tampilkan semua berita jika kategori 'all' dipilih, atau sesuai kategori yang dipilih
            if (category === 'all' || newsCategory === category) {
                item.style.display = 'block'; // Tampilkan
            } else {
                item.style.display = 'none'; // Sembunyikan
            }
        });
    }
</script>
@endsection