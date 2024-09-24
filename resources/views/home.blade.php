@extends('layouts.landing')

@section('title')
Beranda - Immersive
@endsection

@section('content')
@include('components.nav')

<!-- Header -->
<header id="header" class="header py-28 text-center md:pt-36 lg:text-left xl:pt-44 xl:pb-32">
    <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
        <div class="mb-16 lg:mt-32 xl:mt-40 xl:mr-12">
            <h1 class="h1-large mb-5">{{ $header->judul }}</h1>
            <p class="p-large mb-8">{{ $header->subjudul }}</p>
            <a class="btn-solid-lg" href="{{ route('landing.about') }}">About Us</a>
            <!-- <a class="btn-solid-lg secondary" href="#your-link"><i class="fab fa-google-play"></i>Download</a> -->
        </div>
        <div class="xl:text-right">
            <img class="inline" src="{{ asset('/storage/uploads/' .$header->gambar) }}" alt="alternative" />
        </div>
    </div> <!-- end of container -->
</header> <!-- end of header -->
<!-- end of header -->

<!-- Features -->
<div id="features" class="w-full pt-16 pb-6 text-center">
    <div class="container px-4 sm:px-8 xl:px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-start justify-center w-full">
        @foreach ($feature as $data)
        <div class="bg-[#f1f9fc] px-4 py-10 rounded-2xl lg:h-72">
            <div class="mb-6">
                <img class="h-16 w-16 mx-auto" src="{{ $data->icon ? asset('/storage/uploads/'.$data->icon) : asset('images/features-icon-1.svg') }}" alt="alternative" />
            </div>
            <div class="">
                <h5 class="">{{$data->judul}}</h5>
                <p class="mb-4">{{$data->isi}}</p>
            </div>
        </div>
        @endforeach
    </div> <!-- end of container -->
</div>
<!-- end of features -->

<!-- Testimonials -->
<div class="slider-1 py-32 bg-gray">
    <div class="container px-4 sm:px-8">
        <h2 class="mb-12 text-center lg:max-w-xl lg:mx-auto">What do users think about Pavo</h2>

        <!-- Card Slider -->
        <div class="slider-container">
            <div class="swiper-container card-slider">
                <div class="swiper-wrapper">

                    @foreach ($tester as $item)
                    <!-- Slide -->
                    <div class="swiper-slide">
                        <div class="card">
                            <img class="card-image" src="{{ $item->foto ? asset('/storage/uploads/' .$item->foto) : asset('images/profil_kosong.jpg') }}" alt="alternative" />
                            <div class="card-body">
                                <p class="italic mb-3">{{ $item->testi }}</p>
                                <p class="testimonial-author">{{ $item->nama }} - {{ $item->pekerjaan }}</p>
                            </div>
                        </div>
                    </div> <!-- end of swiper-slide -->
                    <!-- end of slide -->
                    @endforeach

                </div> <!-- end of swiper-wrapper -->

                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- end of add arrows -->

            </div> <!-- end of swiper-container -->
        </div> <!-- end of slider-container -->
        <!-- end of card slider -->

    </div> <!-- end of container -->
</div> <!-- end of slider-1 -->
<!-- end of testimonials -->


<!-- Pricing -->
<div id="pricing" class="cards-2">
    <div class="absolute bottom-0 h-40 w-full bg-white"></div>
    <div class="container px-4 pb-px sm:px-8">
        <h2 class="mb-2.5 text-white lg:max-w-xl lg:mx-auto">Pricing options for all budgets</h2>
        <p class="mb-16 text-white lg:max-w-3xl lg:mx-auto"> Our pricing plans are setup in such a way that any user can start enjoying Pavo without worrying so much about costs. They are flexible and work for any type of industry </p>

        <div class="flex">
            @foreach ($price as $harga)
            <!-- Card-->
            <div class="card">
                <div class="card-body flex-grow">
                    <div class="card-title">{{ $harga->jenis}}</div>
                    <div class="price">
                        <span class="currency">Rp.</span>
                        <span class="value">{{ number_format($harga->harga, 0, ',', '.') }}</span><span class="text-sm text-[#252c38]">,000</span>
                    </div>
                    <div class="frequency">/monthly</div>
                    <p class="text-justify">{{ $harga->isi}}</p>
                    <div class="button-wrapper">
                        <a class="btn-solid-reg page-scroll" href="#download">Download</a>
                    </div>
                </div>
            </div> <!-- end of card -->
            <!-- end of card -->
            @endforeach
        </div>


    </div> <!-- end of container -->
</div> <!-- end of cards-2 -->
<!-- end of pricing -->

@endsection