@extends('layouts.landing')

@section('title')
Gallery - Immersive
@endsection

@section('content')
@include('components.nav')

<!-- Header -->
<header id="header" class="header py-28 text-center md:pt-4 xl:pt-10 xl:pb-4">
    <div class="container px-4 sm:px-8">
        <div class="mb-16 lg:mt-32 xl:mt-40">
            <h1 class="h1-large mb-5">Gallery</h1>
        </div>
    </div> <!-- end of container -->
</header> <!-- end of header -->
<!-- end of header -->

<div id="gallery" class="px-20 flex justify-center">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 w-11/12">
        @foreach ($gallery as $data)
        <div class="max-w-md lg:max-w-screen-sm  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative overflow-hidden rounded-lg h-60 md:h-48 lg:h-80">
                    @php
                    $images = json_decode($data->images, true);
                    @endphp
                    @foreach($images as $image)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('/storage/uploads/'.$image) }}" class="h-fit absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <div class="p-5 text-center">
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $data->customer }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-3">{{ $data->deskripsi }}</p>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection